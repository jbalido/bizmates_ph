<?php
/**
 * 
 * User: Jaysser Balido
 * Date: 1/25/2020
 * Time: 9:58 AM
 */

namespace App\Modules\Importer\Repositories\Contracts;

/**
 * Interface PlaceRepositoryInterface
 * @package App\Modules\Importer\Repositories\Contracts
 */
interface PlaceRepositoryInterface
{
    /**
     * Get list of places
     *
     * @return mixed
     */
    public function list();

    /**
     * Get details of a single place
     *
     * @param int $place
     * @return mixed
     */
    public function details(int $place);

    /**
     * Add new place
     *
     * @param array $key
     * @param array $data
     * @return mixed
     */
    public function add(array $key, array $data);
}