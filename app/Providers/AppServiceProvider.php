<?php

namespace SaaSHub\Providers;

use App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\Codesleeve\LaravelStapler\Providers\L5ServiceProvider::class);

        if (env('APP_DEBUG')) {
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }
        if (App::environment('local')) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}