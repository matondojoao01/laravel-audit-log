<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuditLogApiController;

Route::get('audit-logs', [AuditLogApiController::class, 'index']);
