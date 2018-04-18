<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider{

    /*BOOT FUNCTION*/
    public function boot()
    {
        // TODO: Implement register() method.
//        view()->composer('Client::layouts.navigation', 'App\ViewComposers\NavigationComposer');
        view()->composer(['Client::layouts.header', 'Client::layouts.footer'], 'App\ViewComposers\BrandComposer');
        view()->composer(['Client::layouts.header', 'Client::layouts.footer'], 'App\ViewComposers\StaticComposer');
    }

    /*REGISTER FUNCTION*/
    public function register()
    {
        // TODO: Implement register() method.

    }

}