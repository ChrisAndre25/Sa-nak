<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductCategory;

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
        view()->composer('layouts.app', function ($view) {
            $view->with('categories', ProductCategory::select('id', 'name')->get());
        });
    }
}
