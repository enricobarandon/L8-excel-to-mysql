<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\UserType;
use App\ActivityLogs;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo() 
    {
        $user = Auth::user();
        $role = $user->type_id;
        ActivityLogs::create([
            'type' => 'login',
            'user_id' => $user->id,
            'assets' => json_encode(['datetime' => time()])
        ]);
        switch ($role) {
            case '1':
                return '/home';
                break;
            case '2':
                return '/home';
                break;
            default:
                return '/home';
                break;
        }
    }

    public function logout() {
        $user = Auth::user();
        ActivityLogs::create([
            'type' => 'logout',
            'user_id' => $user->id,
            'assets' => json_encode(['datetime' => time()])
        ]);
        Auth::logout();
        return redirect('/');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
}
