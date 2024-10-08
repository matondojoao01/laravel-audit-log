<?php

namespace Matondo\AuditLog\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Matondo\AuditLog\Models\AuditLog;

class AuditLogMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $logData = [
            'user_id' => Auth::check() ? Auth::id() : null,
            'ip_address' => $request->ip(),
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'input' => json_encode($request->except(config('auditlog.exclude'))),
            'status_code' => $response->getStatusCode(),
        ];

        AuditLog::create($logData);

        return $response;
    }
}
