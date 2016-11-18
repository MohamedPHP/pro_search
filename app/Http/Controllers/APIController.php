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
    	return Response::json($this->user->all(),200);
    }
    public function getUser($id)
    {
    	$user = $this->user->find($id);
    	if(!$user){
    		return Response::json(['response'=>"Not Found!"], 400);
    	}
    	return Response::json($user,200);
    }
    public function saveUser()
    {

        $user = $this->user->save();
    	if(!$user){
    		return Response::json(['response'=>"Not Found!"], 400);
    	}
    	return Response::json(['response'=>"Found!"],200);
    }
    public function updateUser($id)
    {
    	$user = $this->user->updateUser($id);
    	if(!$user){
    		return Response::json(['response'=>"Not Found!"], 400);
    	}
    	return Response::json($user,200);
    }
    public function deleteUser($id)
    {
    	if($this->user->deleteUser($id)){
    		return Response::json("User Deleted Successfully!",200);
    	}
    	return Response::json("Error Deleting User!",400);

    }
}
