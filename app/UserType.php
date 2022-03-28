<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class UserType extends Model
{
    protected $table = 'user_type';
    
    protected $fillable = [
        'title', 'description'
    ];

    public $userTitles = [
        '1' => 'Administrator',
        '2' => 'User'
    ];
}
