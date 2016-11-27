<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Response;

class APIController extends Controller
{
    public function __construct(User $user){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    	$this->user = $user;
    }

    public function allUsers()
    {

        return Response::json(['result' => $this->user->all()],200);

    }


    public function getUser($id)
    {
    	$user = $this->user->find($id);

    	if(!$user){
    		return Response::json(['response' => "Not Found!"], 400);
    	}

    	return Response::json(['result' => $user],200);
    }


    public function saveUser(Request $request)
    {
        $user = new User();

        $user->username  = $request['username'];
        $user->firstname = $request['firstname'];
        $user->lastname  = $request['lastname'];
        $user->password  = bcrypt($request['password']);
        $user->phone     = $request['phone_no'];
        $user->email     = $request['email'];
        $user->age       = $request['age'];
        $user->gender    = $request['gender'];
        $user->jop_id    = $request['jop_title'];

        $user->save();

    	if(!$user){
    		return Response::json(['response' => "Error Saving The User!"], 400);
    	}

    	return Response::json(['response' => "Saved Successfully!"], 200);
    }


    public function updateUser(Request $request, $id)
    {
    	$user =  $this->user->find($id);

    	if(!$user){
    		return Response::json(['response' => "Error Updating The User!"], 400);
    	}

    	return Response::json(['response' => "Updated Successfully!"], 200);

    }

}
