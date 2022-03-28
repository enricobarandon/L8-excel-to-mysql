<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\ArenaOverview;
use App\ActivityLogs;
use App\UserType;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_type' => ['required', 'numeric']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = Auth::user();

        $form = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'type_id' => $data['user_type'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ];

        ActivityLogs::create([
            'type' => 'create_user',
            'user_id' => $user->id,
            'assets' => json_encode($form)
        ]);

        return User::create($form);
    }

    public function showRegistrationForm() {
        $user = Auth::user();
        $arenaOverview = ArenaOverview::all();
        $userType = UserType::get();
        if ($user->type_id != '1') {
            return redirect('/home')->withError('Permission denied.');
        }
        return view('auth.register', [
            'user_type' => $userType
        ]);
    }
}
