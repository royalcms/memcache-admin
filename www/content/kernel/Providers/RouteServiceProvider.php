<?php

namespace Kernel\Providers;

use RC_Loader;
use RC_Log;
use Royalcms\Component\Routing\Router;
use Royalcms\Component\Support\Facades\Route;
use Royalcms\Component\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Kernel\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param \Royalcms\Component\Routing\Router $router
     *
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->handleAppRouteHookSubscriber();
        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('content/routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('content/routes/api.php'));
    }


    protected function handleAppRouteHookSubscriber()
    {
        collect(config('bundles', []))->each(function ($app) {
            //loading hooks
            RC_Loader::load_app_class('hooks.route_' . $app, $app, false);

            try {
                //loading subscriber
                $bundle = royalcms('app')->driver($app);
                $class = $bundle->getNamespace() . '\Subscribers\RouteHookSubscriber';
                if (class_exists($class)) {
                    royalcms('Royalcms\Component\Hook\Dispatcher')->subscribe($class);
                }
            }
            catch (\InvalidArgumentException $e) {
                RC_Log::error($e->getMessage());
            }
        });
    }


    protected function handleAppConsoleHookSubscriber()
    {
        collect(config('bundles', []))->each(function($app) {
            //loading hooks
            RC_Loader::load_app_class('hooks.console_' . $app, $app, false);

            //loading subscriber
            $bundle = royalcms('app')->driver($app);
            $class = $bundle->getNamespace() . '\Subscribers\ConsoleHookSubscriber';
            if (class_exists($class)) {
                royalcms('Royalcms\Component\Hook\Dispatcher')->subscribe($class);
            }
        });
    }

}
