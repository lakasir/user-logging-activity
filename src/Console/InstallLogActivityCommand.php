<?php

namespace Lakasir\UserLoggingActivity\Console;

use Illuminate\Console\Command;

class InstallLogActivityCommand extends Command
{
    protected $signature = 'log-activity:install';

    protected $description = 'Install the Log Activity Package';

    public function handle()
    {
        $this->info('Installing Log Activity Package...');

        $this->info('Publishing configuration...');

        $this->call('vendor:publish', [
            '--provider' => "Lakasir\UserLoggingActivity\ActivityServiceProvider",
        ]);

        $this->info('Installed Log Activity Package');
    }
}
