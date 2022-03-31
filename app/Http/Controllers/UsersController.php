<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\UserType;
use Hash;
use Validator;

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
    public function submitUser(Request $request){
        $user = Auth::user();
        
        $dataArray = [
            'type_id' => $request->input('usertype'),
            'first_name' => $request->input('firstName'),
            'last_name' => $request->input('lastName'),
            'email' => $request->input('inputEmail'),
            'password' => Hash::make($request->input('inputPassword')),
        ];
        $query = $user->insertUser($dataArray);
        if($query){
            // return 0;
            return redirect('/users');
        }else{
            return 'Something Went wrong';
        }
        
    }

}
