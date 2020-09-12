<?php

namespace DirectDebitBoom;

use Illuminate\Support\ServiceProvider;

class DDBoomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('adaptor', function () {
            return new BankAdapter();
        });
    }



    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $config = __DIR__ . '/../config/boom.php';
        $this->publishes([
            $config => config_path('boom.php'),
        ], 'config');
    }
}
