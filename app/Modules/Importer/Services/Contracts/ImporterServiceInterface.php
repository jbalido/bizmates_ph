<?php
/**
 * 
 * User: Jaysser Balido
 * Date: 1/25/2020
 * Time: 10:06 AM
 */

namespace App\Modules\Importer\Services\Contracts;

/**
 * Interface ImporterServiceInterface
 * @package App\Modules\Importer\Services\Contracts
 */
interface ImporterServiceInterface
{
    /**
     * Get list of places
     *
     * @return mixed
     */
    public function getList();

    /**
     * Get details of a single place
     *
     * @param int $place
     * @return mixed
     */
    public function getDetails(int $place);

    /**
     * Populate place table from Providers API
     *
     * @return mixed
     */
    public function populate();
}
