<?php
/**
 * 
 * User: Jaysser Balido
 * Date: 1/25/2020
 * Time: 10:05 AM
 */

namespace App\Modules\Importer\Services;

use App\Modules\Importer\Models\Place;
use App\Modules\Importer\Repositories\Contracts\PlaceRepositoryInterface;
use App\Modules\Importer\Services\Contracts\APIServiceInterface;
use App\Modules\Importer\Services\Contracts\ImporterServiceInterface;
use App\Modules\Importer\Transformers\PlaceDetailsTransformer;
use App\Modules\Importer\Transformers\PlaceTransformer;
use Illuminate\Support\Facades\DB;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

use App\Modules\Importer\Repositories\PlaceRepository;
use App\Modules\Importer\Repositories\RecommendationRepository;

/**
 * Class ImporterService
 * @package App\Modules\Importer\Services
 */
class ImporterService implements ImporterServiceInterface
{
    /**
     * @var APIServiceInterface $apiService
     */
    protected $apiService;

    /**
     * @var PlaceRepositoryInterface
     */
    protected $placeRepository;

    /**
     * @var PlaceRepositoryInterface
     */
    protected $recommendationRepository;

    /**
     * @var Manager $manager
     */
    protected $manager;

    /**
     * ImporterService constructor.
     *
     * @param APIServiceInterface $apiService
     * @param PlaceRepositoryInterface $placeRepository
     * @param Manager $manager
     */
    public function __construct(APIServiceInterface $apiService, PlaceRepository $placeRepository, RecommendationRepository $recommendationRepository, Manager $manager)
    {
        $this->apiService = $apiService;
        $this->placeRepository = $placeRepository;
        $this->recommendationRepository = $recommendationRepository;
        $this->manager = $manager;

    }

    /**
     * Get list of places
     *
     * @return mixed
     */
    public function getList()
    {
        if (!$list = $this->placeRepository->list()) {
            return [];
        }

        $paginator = $list->paginate();
        $buses = $paginator->getCollection();

        $resources = new Collection($buses, new PlaceTransformer);
        $resources->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $this->manager
            ->createData($resources)
            ->toArray();
    }

    /**
     * Get details of a single place
     *
     * @param int $place
     * @return mixed
     */
    public function getDetails(int $place)
    {
        if (!$details = $this->placeRepository->details($place)) {
            return [];
        }

        $resources = new Item($details, new PlaceDetailsTransformer);

        return $this->manager
            ->createData($resources)
            ->toArray();
    }

    /**
     * Populate place table from Providers API
     *
     * @return mixed
     */
    public function populate()
    {
        $places = $this->placeRepository->list()->get() ? $this->placeRepository->list()->get()->toArray():false;

        foreach ($places as $key => $place) {
            $mapper   = config('api.mapper');
            $elements = collect(json_decode($this->apiService->get($place['query'])))
               ->pull($mapper['root']);

            if ($elements) {
                $geocodes = isset($elements->geocode) ? (array) $elements->geocode:[];

                if(!empty($geocodes)){

                    $data = collect();

                    foreach ($mapper['response']['fields'] as $key => $value) {
                        
                        if(isset($geocodes['center']->{$value}))
                            $data->put($value, $geocodes['center']->{$value});        
                        else
                            $data->put($value, $geocodes[$value]);
                    }

                    $slug   = $data->pull('slug');
                    $result = $this->placeRepository->add(
                        ['slug' =>  $slug],
                        $data->toArray()
                    );

                    $recommendations = isset($elements->groups) ? (array) current($elements->groups): [];

                    foreach ($recommendations['items'] as $recommendation) {
                        
                        $collection = collect();
                        
                        foreach ($mapper['response']['groups'] as $group) {

                            $collection->put('place_id',$result->id);

                            if(is_array($recommendation->venue->{$group}) || is_object($recommendation->venue->{$group}))
                                $collection->put($group,json_encode($recommendation->venue->{$group}));    
                            else
                                $collection->put($group,$recommendation->venue->{$group});
                        }

                        $id   = $data->pull('id');
                        $this->recommendationRepository->add(
                            ['id' =>  $id],
                            $collection->toArray()
                        );
                    }
                }
            }
        }

        return $places;
    }
}
