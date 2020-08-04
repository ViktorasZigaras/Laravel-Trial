<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MenuService;

class MenuServiceProvider extends ServiceProvider
{
    public function register()
    {
        # make dependecy tree here
        $this->app->singleton(MenuService::class, function($app) {
            return new MenuService();
        });
    }

    public function boot() # inject response
    {
        //
    }
}