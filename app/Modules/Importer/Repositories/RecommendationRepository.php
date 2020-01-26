<?php
/**
 * 
 * User: Jaysser Balido
 * Date: 1/25/2020
 * Time: 9:57 AM
 */

namespace App\Modules\Importer\Repositories;

use App\Modules\Importer\Models\Recommendation;
use App\Modules\Importer\Repositories\Contracts\PlaceRepositoryInterface;

/**
 * Class PlaceRepository
 * @package App\Modules\Importer\Repositories
 */
class RecommendationRepository implements PlaceRepositoryInterface
{
    /**
     * @var Recommendation $model
     */
    protected $model;

    /**
     * PlaceRepository constructor.
     *
     * @param Recommendation $model
     */
    public function __construct(Recommendation $model)
    {
        $this->model = $model;
    }

    /**
     * Get list of recommmendation
     *
     * @return mixed
     */
    public function list()
    {
        return $this->model;
    }

    /**
     * Get details of a single recommmendation
     *
     * @param int $recommmendation
     * @return mixed
     */
    public function details(int $recommmendation)
    {
        return $this->model
            ->where('id', $recommmendation)
            ->first();
    }

    /**
     * Add new recommmendation
     *
     * @param array $key
     * @param array $data
     * @return mixed
     */
    public function add(array $key, array $data)
    {
        return $this->model::updateOrCreate($key, $data);
    }
}