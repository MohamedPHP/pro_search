<?php

namespace App\Http\Controllers\Company;

use App\Company;
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

    protected $guard = 'Company';
    protected $loginView = 'frontend.company.login';
    protected $registerView = 'frontend.company.register';

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
        // `id`, `company_name`, `address`, `email`, `business_type`,`website`,
        // `hashedcode`, `password`, `founder_date`
        return Validator::make($data, [
            'company_name'   => 'required',
            'address'        => 'required',
            'username'       => 'required|email|unique:companies',
            'business_type'  => 'required',
            'website'        => 'url',
            'phones'         => 'required',
            'password'       => 'required|confirmed',
            'founder_date'   => 'required',
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
        $company =  Company::insertGetId([
            'company_name'  => $data['company_name'],
            'address'       => $data['address'],
            'username'      => $data['username'],
            'business_type' => $data['business_type'],
            'website'       => $data['website'],
            'phones'        => $data['phones'],
            'password'      => bcrypt($data['password']),
            'founder_date'  => $data['founder_date'],
        ]);

        $hashcode = '@' . $company . $data['company_name'] . rand(0, 1000);


        $company2 = Company::find($company);
        $company2->hashedcode = $hashcode;
        $company2->save();


        return $company;
    }
}
