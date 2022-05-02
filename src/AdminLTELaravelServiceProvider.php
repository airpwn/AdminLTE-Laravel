<?php

namespace Airpwn\AdminLTELaravel;

use Illuminate\Support\ServiceProvider;

class AdminLTELaravelServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'airpwn');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'airpwn');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/adminlte-laravel.php', 'adminlte-laravel');

        // Register the service the package provides.
        $this->app->singleton('adminlte-laravel', function ($app) {
            return new AdminLTELaravel;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['adminlte-laravel'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/adminlte-laravel.php' => config_path('adminlte-laravel.php'),
        ], 'adminlte-laravel.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/airpwn'),
        ], 'adminlte-laravel.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/airpwn'),
        ], 'adminlte-laravel.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/airpwn'),
        ], 'adminlte-laravel.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
