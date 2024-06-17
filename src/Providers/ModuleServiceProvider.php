<?php

namespace Modules\Mismar\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    protected $providers = [
        MismarServiceProvider::class,
    ];

    public function boot()
    {
        foreach ($this->providers as $provider) {
            $this->app->register($provider);
        }
    }

    public function register()
    {
        //
    }
}
