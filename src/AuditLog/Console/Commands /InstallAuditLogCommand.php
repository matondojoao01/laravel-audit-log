<?php

namespace Matondo\AuditLog\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InstallAuditLogCommand extends Command
{
    protected $signature = 'auditlog:install';
    protected $description = 'Install AuditLog package for API or Web application';

    public function handle()
    {
        $choice = $this->choice(
            'Do you want to install for an API or Web application?',
            ['api', 'web'],
            0
        );

        if ($choice === 'api') {
            $this->installForApi();
        } else {
            $this->installForWeb();
        }

        $this->info('AuditLog package installed successfully.');
    }

    protected function installForApi()
    {
        Artisan::call('vendor:publish', [
            '--provider' => "Matondo\AuditLog\AuditLogServiceProvider",
            '--tag' => ['config', 'migrations', 'api']
        ]);

        $this->info('Published configuration, migrations, and API routes/controllers.');
    }

    protected function installForWeb()
    {
        Artisan::call('vendor:publish', [
            '--provider' => "Matondo\AuditLog\AuditLogServiceProvider",
            '--tag' => ['config', 'migrations', 'web']
        ]);

        $this->info('Published configuration, migrations, web routes/controllers, and views.');
    }
}
