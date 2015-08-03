<?php

namespace FreeTier\Providers;

use App;
use Illuminate\Support\ServiceProvider;

class PresentationServiceProvider extends ServiceProvider
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
        \View::creator('partials.categories', function ($view) {
            $view->with('categories', \FreeTier\Category::orderBy('name', 'DESC')->get());
        });
        \View::creator('partials.most-popular', function ($view) {
            $view->with('services', \FreeTier\Service::with('metas')->limit(4)->get());
        });
    }
}
