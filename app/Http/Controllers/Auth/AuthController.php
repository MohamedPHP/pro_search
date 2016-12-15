<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Jop;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\Events\mailForRegister;

use Event;

use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
    * Where to redirect users after login / registration.
    *
    * @var string
    */
    protected $redirectTo = '/';

    /**
    * Create a new authentication controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
    * Get a validator for an incoming registration request.
    *
    * @param  array  $data
    * @return \Illuminate\Contracts\Validation\Validator
    */
    protected function validator(array $data)
    {
        // `id`, `username`, `fristname`, `lastname`, `password`, `phone`, `email`, `jop_id`, `age`, `gender`, `hashedcode`,

        return Validator::make($data, [
        'username'  => 'required|unique:users|alpha',
        'fristname' => 'required',
        'lastname'  => 'required',
        'password'  => 'required|min:6|confirmed',
        'phone'     => 'required|unique:users',
        'email'     => 'required|unique:users',
        'jop_id'    => 'required',
        'gender'    => 'required',
        'age'       => 'required|numeric',
        ]);
    }

    /**
    * Create a new user instance after a valid registration.
    *
    * @param  array  $data
    * @return User
    */
    protected function create(array $data)
    {
        $user =  User::insertGetId([
        'username'  => $data['username'],
        'firstname' => $data['fristname'],
        'lastname'  => $data['lastname'],
        'password'  => bcrypt($data['password']),
        'phone'     => $data['phone'],
        'email'     => $data['email'],
        'jop_id'    => $data['jop_id'],
        'gender'    => $data['gender'],
        'age'       => $data['age'],
        'image'     => 'src/images/avatar.png',
        ]);

        $fristname = str_split($data['fristname'], 2);
        $lastname = str_split($data['lastname'], 2);


        $hashcode = '$' . $user . $fristname[0] . $lastname[0] . rand(0, 1000);


        $user2 = User::find($user);
        $user2->hashedcode = $hashcode;
        $user2->save();


        return $user;
    }
}
