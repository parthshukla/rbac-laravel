<?php

namespace ParthShukla\Rbac;

use Illuminate\Support\ServiceProvider;

/**
 * RbacServiceProvider class
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class RbacServiceProvider extends ServiceProvider
{

    /**
     * Boot method
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'ps-rbac');
    }

    //-------------------------------------------------------------------------

    /**
     * Register method
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'rbac-laravel');

    }
}
// end of class RbacServiceProvider
// end of file RbacServiceProvider.php
