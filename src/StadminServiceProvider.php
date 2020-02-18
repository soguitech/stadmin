<?php

namespace Soguitech\Stadmin;

use Illuminate\Support\ServiceProvider;
use Soguitech\Stadmin\Console\InstallStadmin;

class StadminServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/stadmin.php', 'stadmin');
    }

    public function boot()
    {


        $this->loadRoutesFrom(__DIR__.'../../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'stadmin');
       // if ($this->app->runningInConsole()) {

            // We can publish all views like this commande below
            // php artisan vendor:publish --provider="Soguitech\Stadmin\StadminServiceProvider" --tag="views"

            $this->publishes([
                __DIR__.'/../config/stadmin.php' =>   config_path('stadmin.php'),
            ], 'config');


            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/stadmin'),
            ], 'views');

            // we can publish all assets like this commande below
            //php artisan vendor:publish --provider="Soguitech\Stadmin\StadminServiceProvider" --tag="assets"

            $this->publishes([
                __DIR__.'/../resources/assets' => public_path('stadmin'),
            ], 'assets');

            $this->commands([
                InstallStadmin::class,
            ]);

            if (function_exists('config_path')) {

                if (! class_exists('CreateArticlesTable')) {
                    $this->publishes([
                        __DIR__ . '/../database/migrations/create_articles_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_articles_table.php'),
                        // you can add any number of migrations here
                    ], 'migrations');
                }

                if (! class_exists('CreateRolesPermissionsTables')) {
                    $this->publishes([
                        __DIR__ . '/../database/migrations/create_roles_permissions_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_roles_permissions_table.php'),
                        // you can add any number of migrations here
                    ], 'migrations');
                }
            }


        // The migrations for this package can be published with command via
            // php artisan vendor:publish --provider="Soguitech\Stadmin\StadminServiceProvider" --tag="migrations"
        //}
    }

}