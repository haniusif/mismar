<?php

namespace Modules\Mismar\Providers;

use Illuminate\Support\ServiceProvider;

class MismarServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load API routes
        $this->loadRoutesFrom(__DIR__.'/../Routes/api.php');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
    }

    public function register()
    {
        //
    }
}
