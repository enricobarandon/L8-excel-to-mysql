<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_id', 'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_type() {
        return $this->hasOne('App\UserType', 'id', 'type_id');
    }

    public static function displayAllUsers() {
        $users = User::with('user_type')
                    ->get();

        $usersTable = '';

        foreach($users as $user) {
            $usersTable .= '<tr>';
            $usersTable .= '<td>'. $user->id .'</td>';
            $usersTable .= '<td>'. $user->user_type->title .'</td>';
            $usersTable .= '<td>'. $user->first_name . ' ' . $user->last_name .'</td>';
            $usersTable .= '<td>'. $user->email .'</td>';
            $usersTable .= '<td>--</td>';
            $usersTable .= '</tr>';
        }

        return $usersTable;
    }
}
