<?php

namespace Yadders\RupiahRedenom;

use Illuminate\Support\ServiceProvider;

class RupiahRedenomServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Bind the main class to the app container
        $this->app->bind('rupiah-redenom', function ($app) {
            return new RupiahRedenom();
        });
    }

    public function boot()
    {
        // If you had config files or routes, you would load them here
    }
}