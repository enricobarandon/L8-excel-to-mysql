<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::displayAllUsers();
        
        return view('admin.users', [
            'users' => $users
        ]);
    }
}
