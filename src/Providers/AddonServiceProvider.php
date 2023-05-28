<?php

namespace Addons\ContactForm\Providers;

use Fusion;
use Fusion\Facades\Menu;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AddonServiceProvider extends \Fusion\Providers\AddonServiceProvider
{
    /**
     * Register any addon services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
        
        // View::addNamespace('contact-form', dirname(dirname(__DIR__)).'/resources/views');
        View::getFinder()->prependLocation(dirname(dirname(__DIR__)).'/resources/views');
    }

    /**
     * Bootstrap any addon services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $addonName = 'ContactForm';
        $basePath = dirname(dirname(dirname(__FILE__)));

        if (!File::isDirectory(public_path("addons"))) {
            File::makeDirectory(public_path("addons"));
        }

        if (!File::exists(public_path("addons/{$addonName}"))) {
            // Create symlink
            File::link(
                "{$basePath}/public",
                public_path("addons/{$addonName}")
            );
        }
        
        $this->app->booted(function ($app) use($addonName) {
            \Fusion::asset(mix('js/app.js', 'addons/'.$addonName)->toHtml());
        });
        // fieldtypes()->register(\Addons\ContactForm\Fieldtypes\ContactFormFieldtype::class);
    }
}