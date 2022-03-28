<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\UserType;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::displayAllUsers();
        $user = Auth::user();
        
        return view('admin.users', [
            'users' => $users,
            'userType' => UserType::find($user->type_id)->title
        ]);
    }
}
