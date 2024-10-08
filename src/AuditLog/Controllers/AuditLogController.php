<?php

namespace App\Http\Controllers;

use Matondo\AuditLog\Models\AuditLog;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    public function index()
    {
        $logs = AuditLog::all();
        return view('auditlog.index', compact('logs'));
    }
}
