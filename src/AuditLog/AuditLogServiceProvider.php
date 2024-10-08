<?php

namespace Matondo\AuditLog;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;

class AuditLogServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Mescla a configuração personalizada com a configuração padrão
        $this->mergeConfigFrom(__DIR__ . '/../src/config/auditlog.php', 'auditlog');

        // Registra o comando de instalação
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Matondo\AuditLog\Console\Commands\InstallAuditLogCommand::class,
            ]);
        }
    }

    public function boot()
    {
        // Carrega as migrações
        $this->loadMigrationsFrom(__DIR__ . '/../src/database/migrations');
        
        // Publicação para API
        $this->publishes([
            __DIR__ . '/../src/config/auditlog.php' => config_path('auditlog.php'),
            __DIR__ . '/../src/database/migrations/create_audit_logs_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_audit_logs_table.php'),
            __DIR__ . '/../src/routes/api.php' => base_path('routes/auditlog_api.php'),
            __DIR__ . '/../src/Http/Controllers/Api/AuditLogApiController.php' => app_path('Http/Controllers/Api/AuditLogApiController.php'),
        ], 'api');

        // Publicação para Web
        $this->publishes([
            __DIR__ . '/../src/config/auditlog.php' => config_path('auditlog.php'),
            __DIR__ . '/../src/database/migrations/create_audit_logs_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_audit_logs_table.php'),
            __DIR__ . '/../src/routes/web.php' => base_path('routes/auditlog_web.php'),
            __DIR__ . '/../src/Http/Controllers/AuditLogController.php' => app_path('Http/Controllers/AuditLogController.php'),
            __DIR__ . '/../src/resources/views/auditlog/index.blade.php' => resource_path('views/auditlog/index.blade.php'),
        ], 'web');
    }
}
