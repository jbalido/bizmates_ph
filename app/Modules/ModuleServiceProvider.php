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
        $this->loadModuleServiceRoutes();
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
     * Load module service routes
     *
     * @return void
     */
    public function loadModuleServiceRoutes()
    {
        foreach ($this->modules as $module => $service) {
            if (is_array($service)) {
                foreach ($service as $srvc) {
                    if (file_exists($this->baseDirectory . '/' . $module . '/' . $srvc . '/routes.php')) {
                        include $this->baseDirectory . '/' . $module . '/' . $srvc . '/routes.php';
                    }
                }
            } else {
                if (file_exists($this->baseDirectory . '/' . $service . '/routes.php')) {
                    include $this->baseDirectory . '/' .$service . '/routes.php';
                }
            }
        }
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
