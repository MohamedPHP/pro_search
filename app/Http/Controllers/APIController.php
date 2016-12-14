<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Response;
use App\Jop;
use Auth;
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

    public function loginUser(Request $request)
    {
        if (count(User::where('hashedcode', $request['hashedcode'])->first()) > 0) {
            $userData = User::where('hashedcode', $request['hashedcode'])->first();
            $jop = Jop::where('id' ,$userData->jop_id)->first();

            return Response::json(['response' => $userData, 'job_title' => $jop->content,'status' => 'Found'], 200);
        }else {
            return Response::json(['status' => "Not Found"], 200);
        }
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
        $user->image     = 'src/images/avatar.png';
        if (count(Jop::where('content', $request['job_title'])->get()) == 0) {
            $jop = new Jop();
            $jop->content = $request['job_title'];
            $jop->save();
            $user->jop_id = $jop->id;
        }elseif (count(Jop::where('content', $request['job_title'])->get()) > 0) {
            $jop = Jop::where('content', $request['job_title'])->first();
            $user->jop_id = $jop->id;
        }

        $user->save();


        $fristname = str_split($user->firstname, 2);
        $lastname = str_split($user->lastname, 2);


        $hashcode = '$' . $user->id . $fristname[0] . $lastname[0] . rand(0, 1000);


        $user2 = User::find($user->id);
        $user2->hashedcode = $hashcode;
        $user2->save();


    	if(!$user){
    		return Response::json(['response' => "Error Saving The User!"], 400);
    	}

    	return Response::json(['response' => "Saved Successfully!"], 200);
    }


    public function updateUser(Request $request, $id)
    {
        return Response::json(['response' => "Updated Successfully!"], 200);
    	$user =  $this->user->find($id);

        $user->username  = $request['username'];
        $user->firstname = $request['firstname'];
        $user->lastname  = $request['lastname'];
        $user->password  = bcrypt($request['password']);
        $user->phone     = $request['phone_no'];
        $user->email     = $request['email'];
        $user->age       = $request['age'];
        $user->gender    = $request['gender'];
        if (count(Jop::where('content', $request['job_title'])->first()) == 0) {
            $jop = new Jop();
            $jop->content = $request['job_title'];
            $jop->save();
            $user->jop_id = $jop->id;
        }elseif (count(Jop::where('content', $request['job_title'])->first()) > 0) {
            $jop = Jop::where('content', $request['job_title'])->first();
            $user->jop_id = $jop->id;
        }
        $user->save();

    	if(!$user){
    		return Response::json(['response' => "Error Updating The User!"], 400);
    	}
    	return Response::json(['response' => "Updated Successfully!"], 200);

    }


    public function imgaeUpload(Request $request)
    {
        //Checks if request has file or not
        if ($request->hasFile('image')) {
            //checks if file is uploaded or not
            if ($request->file('image')->isValid()) {

                $user = User::find($request['id']);

                $extension = $request->file('image')->getClientOriginalExtension();
                $sha1 = sha1($request->file('image')->getClientOriginalName());
                $filename = date('Y-m-d-h-i-s')."_".$sha1.".".$extension;
                // this path is for the server but in the local you need to make public_path() function
                $path  = '/home7/deziquec/public_html/professearch/'.'src/images/users/';

                $image = '/home7/deziquec/public_html/professearch/'.$user->image;

                $request->file('image')->move($path, $filename);
                $user->image = 'src/images/users/'.$filename;
                $user->save();

                if($image){
                    unlink($image);
                }

                if(!$user){
                    return Response::json(['response' => "Error Updating The User Image!"], 400);
                }

                return Response::json(['response' => "Image Updated Successfully!"], 200);

            }else {
                return Response::json(['response' => "Image Is Not Valid!"], 200);
            }
        }else {
            return Response::json(['response' => "You did't Send Any Files!"], 200);
        }

    }


}
