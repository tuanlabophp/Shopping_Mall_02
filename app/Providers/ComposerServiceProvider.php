<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $categoryComposer = [
            'sites._components.top_banner',
            'sites._components.filter',
            'sites._components.navigation',
            ];

        view()->composer('sites._sections.navbar', 'App\Http\ViewComposers\NavbarComposer');
        view()->composer($categoryComposer, 'App\Http\ViewComposers\CategoryComposer');
        view()->composer('sites._sections.footer', 'App\Http\ViewComposers\TopFiveProductComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}