<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        // View::composer(
        //     'pages.blog.show',
        //     'App\Http\Controllers\HomeController'
        // );
        view()->composer(
            'layouts.frontend.partials.footer',
            'App\Http\Controllers\HomeController'
        );

        Schema::defaultStringLength(191);
    }
}
