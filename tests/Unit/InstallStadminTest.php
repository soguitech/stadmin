<?php

namespace Soguitech\Stadmin\Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Soguitech\Stadmin\Tests\TestCase;

class InstallStadminTest extends TestCase
{
    /** @test */
    function the_install_command_copies_a_the_configuration()
    {
        // make sure we're starting from a clean state
        if (File::exists(config_path('stadmin.php'))) {
            unlink(config_path('stadmin.php'));
        }

        $this->assertFalse(File::exists(config_path('stadmin.php')));

        Artisan::call('stadmin:install');

        $this->assertTrue(File::exists(config_path('stadmin.php')));
    }
}