<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jop;
use App\User;
use App\Company;

class UserController extends Controller
{
    // `id`, `username`, `fristname`, `lastname`, `password`, `phone`, `email`, `jop_id`, `age`, `gender`, `hashedcode`,
    public function dashboard()
    {
        $users = User::where('isadmin', 0)->get();
        $companies = Company::all();
        return view('backend.pages.dashboard', compact('users', 'companies'));
    }

    public function index()
    {
        $users = User::where('isadmin', 0)->get();
        return view('backend.pages.users.users', compact('users'));
    }
    public function getcreate(Request $request)
    {
        $jops = Jop::all();
        return view('backend.pages.users.users-create', compact('jops'));
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'Username'    => 'required|unique:users',
            'firstname'   => 'required',
            'lastname'    => 'required',
            'password'    => 'required',
            'phone'       => 'required|unique:users',
            'email'       => 'required|unique:users',
            'age'         => 'required',
            'gender'      => 'required',
            'jop_id'      => 'required',
        ]);
        $user = new User();
        $user->Username = $request['Username'];
        $user->firstname = $request['firstname'];
        $user->lastname = $request['lastname'];
        $user->password = bcrypt($request['password']);
        $user->phone = $request['phone'];
        $user->email = $request['email'];
        $user->age = $request['age'];
        $user->gender = $request['gender'];
        $user->jop_id = $request['jop_id'];
        $user->image = 'src/images/avatar.png';

        $user->save();


        $fristname = str_split($user->firstname, 2);
        $lastname = str_split($user->lastname, 2);


        $hashcode = '$' . $user->id . $fristname[0] . $lastname[0] . rand(0, 1000);


        $user2 = User::find($user->id);
        $user2->hashedcode = $hashcode;
        $user2->save();

        return redirect()->back()->with(['message' => 'The User "'.$user->firstname.'" Added Successfully']);
    }

    public function getProfile()
    {
        return view('frontend.user.profile');
    }

    public function updateProfile(Request $request, $id)
    {
        $this->validate($request, [
            'Username'  =>  'required|',
            'firstname' =>  'required|',
            'lastname'  =>  'required|',
            'password'  =>  'required|',
            'phone'     =>  'required|',
            'email'     =>  'required|email|unique:users'.$id,
            'age'       =>  'required|',
            'jop_id'    =>  'required|',
            'image'     =>  'image',
        ]);
        $user = User::find($id);
        $user->Username     = $request['Username'];
        $user->firstname    = $request['firstname'];
        $user->lastname     = $request['lastname'];
        if ($request['password'] !== $user->password) {
            $user->password = bcrypt($request['password']);
        }
        $user->phone        = $request['phone'];
        $user->email        = $request['email'];
        $user->age          = $request['age'];
        $user->jop_id       = $request['jop_id'];
        if ($user->image == 'src/images/avatar.png') {
            $user->image = $this->upload($request['image']);
        }else {
            $image = $user->image;
            unlink('/home7/deziquec/public_html/professearch/'.$image);
            $user->image = $this->upload($request['image']);
        }
        $user->save();
        return redirect()->back()->with(['message' => 'Profile Updated Successfully']);
    }

    public function upload($file){
        $extension = $file->getClientOriginalExtension();
        $sha1 = sha1($file->getClientOriginalName());
        $filename = date('Y-m-d-h-i-s')."_".$sha1.".".$extension;
        $path  = '/home7/deziquec/public_html/professearch/'.'src/images/users/';
        $file->move($path, $filename);
        return 'src/images/users/'.$filename;
    }

    public function viewUpdate($id)
    {
        $user = User::find($id);
        $jops = Jop::all();
        return view('backend.pages.users.users-update', compact('jops', 'user'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'Username'    => 'required',
        'firstname'   => 'required',
        'lastname'    => 'required',
        'password'    => 'required',
        'phone'       => 'required',
        'email'       => 'required',
        'age'         => 'required',
        'gender'      => 'required',
        'jop_id'      => 'required',
        ]);
        $user = User::find($id);
        $user->Username = $request['Username'];
        $user->firstname = $request['firstname'];
        $user->lastname = $request['lastname'];
        if ($request['password'] !== $user->password) {
            $user->password = bcrypt($request['password']);
        }
        $user->phone = $request['phone'];
        $user->image = 'src/images/logo.png';
        $user->email = $request['email'];
        $user->age = $request['age'];
        $user->gender = $request['gender'];
        $user->jop_id = $request['jop_id'];

        $user->save();
        return redirect()->back()->with(['message' => 'The User "'.$user->firstname.'" Updated Successfully']);
    }
    public function delete($id)
    {
        $user = User::find($id);
        $name = $user->firstname;
        $user->delete();
        return redirect()->back()->with(['message' => 'The User "'.$name.'" Deleted Successfully']);
    }
}
