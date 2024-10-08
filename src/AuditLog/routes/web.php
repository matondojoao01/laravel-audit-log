<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuditLogController;

Route::get('audit-logs', [AuditLogController::class, 'index']);
