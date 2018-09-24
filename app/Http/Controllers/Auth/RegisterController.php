<?php

namespace App\Http\Controllers\Auth;

use App\Profile_settings;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/Newsfeed';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'nickname' => 'required|string|max:50|min:2|unique:users',
            'email' => 'required|string|email|max:50|unique:users',
            'gender' => 'required|string|max:50',
            'birthday' => 'required|date|max:50',
            'password' => 'required|string|min:6|confirmed',
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
        $user = User::create([
            'first_name' => ucfirst($data['first_name']),
            'last_name' => ucfirst($data['last_name']),
            'nickname' => $data['nickname'],
            'email' => $data['email'],
            'gender' => ucfirst($data['gender']),
            'birthday' => $data['birthday'],
            'password' => bcrypt($data['password']),
        ]);
        $user->Profile_settings = Profile_settings::create([
            'User_id' => $user->id,
            'Profile_picture' => base64_encode(file_get_contents('../public/img/default_profile.jpg')),
            'Title' => $data['nickname'],
            'Bio' => 'Dit is jouw bio, Vul wat rotzooi in voor de leuk',
        ]);
        return $user;

    }

}
