<?php
/**
 * 
 * User: Jaysser Balido
 * Date: 1/25/2020
 * Time: 9:56 AM
 */

namespace App\Modules\Importer\Providers;

use App\Modules\Importer\Services\APIService;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

/**
 * Class ImporterServiceProvider
 * @package App\Modules\Importer\Providers
 */
class ImporterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('App\Modules\Importer\Services\Contracts\APIServiceInterface', function () {
                $client = $this->app->make(Client::class);
                return new APIService($client, config('api.foursquare_url'));
            }
        );

        $this->app->bind(
            'App\Modules\Importer\Services\Contracts\ImporterServiceInterface',
            'App\Modules\Importer\Services\ImporterService'
        );

        $this->app->bind(
            'App\Modules\Importer\Repositories\Contracts\PlaceRepositoryInterface',
            'App\Modules\Importer\Repositories\PlaceRepository'
        );

        $this->app->bind(
            'App\Modules\Importer\Repositories\Contracts\PlaceRepositoryInterface',
            'App\Modules\Importer\Repositories\RecommendationRepository'
        );
    }
}
