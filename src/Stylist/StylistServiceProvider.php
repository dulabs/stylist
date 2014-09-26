<?php

namespace FloatingPoint\Stylist;

use Illuminate\Foundation\AliasLoader;

class StylistServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('floatingpoint/stylist');
    }

    /**
     * Registers the various bindings required by other packages.
     */
    public function register()
    {
        $this->registerAlias();
        $this->registerStylist();
    }

    /**
     * Sets up the object that will be used for theme registration calls.
     */
    private function registerStylist()
    {
        $this->app->singleton('stylist', 'FloatingPoint\Stylist\Theme\Stylist');
    }
    
    /**
     * Stylist class should be accessible from global scope for ease of use.
     */
    private function registerAlias()
    {
        AliasLoader::getInstance()->alias('Stylist', 'FloatingPoint\Stylist\Facades\Stylist');
    }

    /**
     * An array of classes that Stylist provides.
     *
     * @return array
     */
    public function provides()
    {
        return ['Stylist'];
    }
}
