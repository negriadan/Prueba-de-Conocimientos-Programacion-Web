<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use Illuminate\Pagination\Paginator; //para paginar

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
        //para paginar
       // Paginator::useBootstrap();

    }
}
