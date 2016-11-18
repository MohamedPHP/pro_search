<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Hash;
use Input;

class API extends Model
{

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $fillable = [
        'username',
        'firstname',
        'lastname',
        'password',
        'phone',
        'email',
    ];

    public function allUsers(){
    	return self::all();
    }

    public function getUser($id){
    	$user = self::find($id);
    	if(is_null($user)){
    		return false;
    	}
    	return $user;
    }

    public function saveUser(){
    	$input = Input::all();

		$input['password'] = bcrypt($input['password']);
    	$user = new User();
    	$user->fill($input); // associação em massa

    	$email = self::lists('email')->all();
    	foreach ($email as $key => $value) {
    		if($value == $input['email']){
    			return false;
    		}
    	}

    	return $user->save();

    }

    public function updateUser($id)
    {
    	$user = self::find($id);
    	if(is_null($user)){
    		return false;
    	}
    	$input = Input::all();
    	if(isset($input['password'])){
    		$input['password'] = Hash::make($input['password']);
    	}
    	$user->fill($input); // associação em massa
    	$user->save();
    	return $user;
    }

    public function deleteUser($id)
    {
    	$user = self::find($id);
    	if(is_null($user)){
    		return false;
    	}
    	return $user->delete();
    }

}
