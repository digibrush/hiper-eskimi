<?php

namespace Digibrush\HiperEskimi;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class EskimiServiceProvider extends ServiceProvider
{
    public function boot() :void
    {
        $this->publishes([
            __DIR__.'/../config/eskimi.php' => config_path('eskimi.php')
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/eskimi.php',
            'eskimi'
        );

        $this->app->singleton('eskimi', function (Application $app): Eskimi {
            return $app->make(Eskimi::class);
        });
    }
}
