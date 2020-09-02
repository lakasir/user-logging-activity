<?php

namespace Lakasir\UserLoggingActivity;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Lakasir\UserLoggingActivity\Console\InstallLogActivityCommand;

class ActivityServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'user-logging-activity');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'user-logging-activity');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/activity_log.php' => config_path('activity_log.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../database/migrations/create_activity_log_table.php.stub'
                => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_activity_log_table.php'),
            ], 'migrations');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/user-logging-activity'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/user-logging-activity'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/user-logging-activity'),
            ], 'lang');*/

            // Registering package commands.
            $this->commands([
                InstallLogActivityCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/activity_log.php', 'activity_log');

        // Register the main class to use with the facade
        $this->app->singleton('user-logging-activity', function () {
            return new Activity();
        });
    }
}
