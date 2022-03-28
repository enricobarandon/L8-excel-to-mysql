<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLogs extends Model
{
    protected $table = 'activity_logs';

    protected $fillable = [
        'type',
        'user_id',
        'assets',
    ];

    public $types = [
        'login' => 'User login',
        'logout' => 'User logged out',
        'create_user' => 'Administrator account created a user account',
        'import_file' => 'Administrator account uploaded a excel file'
    ];
}
