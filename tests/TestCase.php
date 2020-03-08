<?php
namespace Soguitech\Stadmin\Tests;

use Soguitech\Stadmin\StadminServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // additional setup

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->withFactories(__DIR__.'/../database/factories');
        $this->author = factory(User::class)->create();
    }

    protected function getPackageProviders($app)
    {
        return [
            StadminServiceProvider::class,
        ];
        //return ['Soguitech\Stadmin\StadminServiceProvider'];
    }

    public function getEnvironmentSetUp($app)
    {
        include_once __DIR__ . '/../database/migrations/create_blogs_table.php.stub';
        include_once __DIR__ . '/../database/migrations/create_admins_table.php.stub';

        // run the up() method (perform the migration)
        (new \CreateArticlesTable)->up();
        (new \CreateUsersTable)->up();
    }
}