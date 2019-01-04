<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\Tymon\JWTAuth\Providers\LumenServiceProvider::class);

        $this->app['auth']->viaRequest('api', function ($request)
        {
            return app('auth')->setRequest($request)->user();
        });
    }
}
