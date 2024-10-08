<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Matondo\AuditLog\Models\AuditLog;
use Illuminate\Http\JsonResponse;

class AuditLogApiController extends Controller
{
    public function index(): JsonResponse
    {
        $logs = AuditLog::all();
        return response()->json($logs);
    }
}
