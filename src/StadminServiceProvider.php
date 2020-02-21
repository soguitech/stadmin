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
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'stadmin');

        $this->ensureHttps();

        $this->loadRoutesFrom(__DIR__.'../../routes/web.php');

        if ($this->app->runningInConsole()) {

            $this->commands([InstallStadmin::class]);

            $this->publishes([__DIR__.'/../config/stadmin.php' =>   config_path('stadmin.php')], 'config');
            $this->publishes([__DIR__.'/../resources/views' => resource_path('views/vendor/stadmin')], 'views');
            $this->publishes([
                __DIR__.'/../public/js' => public_path('js/vendor/stadmin'),
                __DIR__.'/../public/css' => public_path('css/vendor/stadmin'),
                __DIR__.'/../public/scss' => public_path('css/vendor/scss')
            ], 'assets');
            $this->publishes([
                __DIR__.'/../resources/js' => resource_path('js/vendor/stadmin'),
                __DIR__.'/../resources/css' => resource_path('css/vendor/stadmin'),
            ], 'vue-component');
            $this->publishes([
                __DIR__ . '/../database/migrations/create_articles_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_articles_table.php'),
                __DIR__ . '/../database/migrations/create_roles_permissions_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_roles_permissions_table.php')
            ], 'migrations');

        }
    }

    protected function ensureHttps()
    {
        if (config('stadmin.https') || config('stadmin.secure')) {
            url()->forceScheme('https');
            $this->app['request']->server->set('HTTPS', true);
        }
    }

}