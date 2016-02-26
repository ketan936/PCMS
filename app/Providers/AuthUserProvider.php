<?php namespace App\Providers;

use App\User;
use App\Auth\UserProvider;
use Illuminate\Support\ServiceProvider;

class AuthUserProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['auth']->extend('custom',function()
        {
            return new UserProvider();
        });
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

