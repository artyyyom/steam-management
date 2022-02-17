<?php

namespace App\Providers;

use App\Http\Services\Steam\SteamApiAlyansService;
use App\Http\Services\Steam\SteamApiChainService;
use Illuminate\Support\ServiceProvider;
use App\Http\Interfaces\SteamApiManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $service = new SteamApiChainService(new SteamApiAlyansService());

        $this->app->instance(SteamApiManager::class, $service);
    }
}
