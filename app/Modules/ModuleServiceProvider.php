<?php

namespace App\Modules;

use Illuminate\Support\ServiceProvider;

/**
 * Class ModuleServiceProvider
 * @package App\Modules
 */
class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Registered modules and services
     *
     * @var array
     */
    protected $modules;

    /**
     * Base directory string value for bootstrapping
     *
     * @var string
     */
    protected $baseDirectory = __DIR__;

    /**
     * Initialize service provider
     *
     * @return  void
     */
    public function __construct()
    {
        $this->modules = config('module.modules');
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadModuleServiceViews();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Load module service views
     *
     * @return void
     */
    public function loadModuleServiceViews()
    {
        foreach ($this->modules as $module => $service) {
            if (!is_array($service)) {
                if (is_dir($this->baseDirectory . '/' . $service . '/Views')) {
                    $this->loadViewsFrom($this->baseDirectory . '/' . $service . '/Views', $service);
                }
            }
        }
    }
}
