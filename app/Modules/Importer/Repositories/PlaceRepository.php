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
        return $this->model
            ->where('id', $places)
            ->first();
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
}