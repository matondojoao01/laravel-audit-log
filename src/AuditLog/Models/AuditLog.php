<?php

namespace Matondo\AuditLog\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    protected $fillable = [
        'user_id', 'ip_address', 'url', 'method', 'input', 'status_code'
    ];
}
