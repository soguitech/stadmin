<?php

namespace Soguitech\Stadmin;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Soguitech\Stadmin\Console\InstallStadmin;
use Soguitech\Stadmin\Middlewares\StadminAuth;
use Soguitech\Stadmin\Middlewares\StadminGuest;

class StadminServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/stadmin.php', 'stadmin');
        $this->app->bind('admin', function($app) {
            return new \Soguitech\Stadmin\Admin();
        });
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'stadmin');

        $this->ensureHttps();

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        try {
            $router = $this->app->make(Router::class);
            $router->aliasMiddleware('stadmin.guest', StadminGuest::class);
            $router->aliasMiddleware('stadmin.auth', StadminAuth::class);
        } catch (BindingResolutionException $e) {
        }

        if ($this->app->runningInConsole()) {

            $this->commands([InstallStadmin::class]);

            $this->publishes([__DIR__.'/../config/stadmin.php' =>   config_path('stadmin.php')], 'config');
            $this->publishes([__DIR__.'/../resources/views' => resource_path('views/vendor/stadmin')], 'views');
            $this->publishes([
                __DIR__.'/../public/js' => public_path('js/vendor/stadmin'),
                __DIR__.'/../public/css' => public_path('css/vendor/stadmin'),
                __DIR__.'/../public/scss' => public_path('scss/vendor/stadmin'),
                __DIR__.'/../public/img' => public_path('img/vendor/stadmin'),
                __DIR__.'/../public/fonts' => public_path('fonts/vendor/stadmin')
            ], 'assets');
            $this->publishes([
                __DIR__ . '/../database/migrations/create_admins_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_admins_table.php'),
                __DIR__ . '/../database/migrations/create_blogs_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_blogs_table.php'),
                __DIR__ . '/../database/migrations/create_categories_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_categories_table.php'),
                __DIR__ . '/../database/migrations/create_clients_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_clients_table.php'),
                __DIR__ . '/../database/migrations/create_projects_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_projects_table.php'),
                __DIR__ . '/../database/migrations/create_roles_permissions_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_roles_permissions_table.php'),
                __DIR__ . '/../database/migrations/create_statuts_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_statuts_table.php'),
                __DIR__ . '/../database/migrations/create_tags_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_tags_table.php'),
                __DIR__ . '/../database/migrations/create_teams_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_teams_table.php'),
                __DIR__ . '/../database/migrations/create_z_foreign_keys.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_z_foreign_keys.php'),
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