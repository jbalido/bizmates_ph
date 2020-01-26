<?php
/**
 * 
 * User: Jaysser Balido
 * Date: 1/25/2020
 * Time: 12:08 PM
 */

namespace App\Modules\Importer\Services\Contracts;


interface APIServiceInterface
{
    /**
     * Get response from the API provider
     *
     * @return mixed
     */
    public function get($query);
}