<?php

namespace Modules\Mismar\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Modules\Mismar\Http\Middleware\MismarAuthMiddleware;
use Modules\Mismar\Http\Middleware\MismarStagingAuthMiddleware;

class MismarServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/api.php');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'mismar');

        // Register the middleware
        $router = $this->app['router'];
        $router->aliasMiddleware('mismar.staging.auth', MismarStagingAuthMiddleware::class);
        $router->aliasMiddleware('mismar.auth', MismarAuthMiddleware::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'mismar');
    }
}
