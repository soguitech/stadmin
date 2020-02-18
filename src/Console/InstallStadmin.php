<?php

namespace Soguitech\Stadmin\Console;

use Illuminate\Console\Command;

class InstallStadmin extends Command
{
    //protected $hidden = true;

    protected $signature = 'stadmin:install';

    protected $description = 'Install the Stadmin';

    public function handle()
    {
        $this->info('Installing Stadmin...');

        $this->info('Publishing configuration...');

        $this->call('vendor:publish', [
            '--provider' => "Soguitech\Stadmin\StadminServiceProvider",
            '--tag' => "config"
        ]);

        $this->info('Installed Stadmin');
    }

}