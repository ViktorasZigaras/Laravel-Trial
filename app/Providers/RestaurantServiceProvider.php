<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\RestaurantService;

class RestaurantServiceProvider extends ServiceProvider
{
    public function register()
    {
        # make dependecy tree here
        $this->app->singleton(RestaurantService::class, function($app) {
            return new RestaurantService();
        });
    }

    public function boot() # inject response
    {
        //
    }
}