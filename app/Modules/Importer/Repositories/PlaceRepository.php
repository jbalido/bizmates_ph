<?php
/**
 * 
 * User: Jaysser Balido
 * Date: 1/25/2020
 * Time: 9:57 AM
 */

namespace App\Modules\Importer\Repositories;

use App\Modules\Importer\Models\Place;
use App\Modules\Importer\Repositories\Contracts\PlaceRepositoryInterface;

/**
 * Class PlaceRepository
 * @package App\Modules\Importer\Repositories
 */
class PlaceRepository implements PlaceRepositoryInterface
{
    /**
     * @var Place $model
     */
    protected $model;

    /**
     * PlaceRepository constructor.
     *
     * @param Place $model
     */
    public function __construct(Place $model)
    {
        $this->model = $model;
    }

    /**
     * Get list of places
     *
     * @return mixed
     */
    public function list()
    {
        return $this->model;
    }

    /**
     * Get details of a single places
     *
     * @param int $places
     * @return mixed
     */
    public function details(int $places)
    {
        $details = $this->model
            ->where('id', $places)
            ->first();

        $details->setRelation('recommendation', $details->recommendation()->paginate(10));

        return $details;
    }

    /**
     * Add new places
     *
     * @param array $key
     * @param array $data
     * @return mixed
     */
    public function add(array $key, array $data)
    {
        return $this->model::updateOrCreate($key, $data);
    }

    /**
     * Get single place
     *
     * @return mixed
     */

    public function getPlace($place)
    {
        return $this->model::find($place);
    }

    /**
     * Get list of place names
     *
     * @return mixed
     */

    public function listPlaces($place)
    {
        return $this->model::where('name','LIKE','%'.$place.'%');
    }
}