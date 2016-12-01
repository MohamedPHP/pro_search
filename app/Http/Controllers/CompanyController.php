<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Company;

use Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('backend.pages.companies.companies', compact('companies'));
    }
    public function getcreate(Request $request)
    {
        return view('backend.pages.companies.companies-create');
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'company_name'  =>  'required|min:4|unique:companies',
            'address'       =>  'required',
            'username'         =>  'required|email',
            'business_type' =>  'required',
            'website'       =>  'required|url',
            'phones'        =>  'required',
            'password'      =>  'required|confirmed|min:6',
            'founder_date'  =>  'required',
        ]);
        $company = new Company();
        $company->company_name  = $request['company_name'];
        $company->address       = $request['address'];
        $company->username         = $request['username'];
        $company->business_type = $request['business_type'];
        $company->website       = $request['website'];
        $company->phones       = $request['phones'];
        $company->password      = bcrypt($request['password']);
        $company->founder_date  = $request['founder_date'];
        $company->save();

        $company_name = str_split($company->company_name, 3);
        $hashcode = '@' . $company->id . $company_name[0] . rand(0, 1000);
        $company2 = Company::find($company->id);
        $company2->hashedcode = $hashcode;
        $company2->save();

        return redirect()->back()->with(['message' => 'The Company "'.$company->company_name.'" Added Successfully']);

    }
    public function viewUpdate($id)
    {
        $company = Company::find($id);
        return view('backend.pages.companies.companies-update', compact('company'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'company_name'  =>  'required|min:4',
            'address'       =>  'required',
            'username'         =>  'required|email',
            'business_type' =>  'required',
            'website'       =>  'required|url',
            'phones'        =>  'required',
            'password'      =>  'required|min:6',
            'founder_date'  =>  'required',
        ]);
        $company = Company::find($id);
        $company->company_name  = $request['company_name'];
        $company->address       = $request['address'];
        $company->username      = $request['username'];
        $company->business_type = $request['business_type'];
        $company->website       = $request['website'];
        $company->phones        = $request['phones'];
        if ($request['password'] !== $company->password) {
            $company->password = bcrypt($request['password']);
        }
        $company->founder_date  = $request['founder_date'];
        $company->save();

        return redirect()->back()->with(['message' => 'The Company "'.$company->company_name.'" Updated Successfully']);
    }
    public function delete($id)
    {
        $company = Company::find($id);
        $name = $company->company_name;
        $company->delete();
        return redirect()->back()->with(['message' => 'The Company "'.$name.'" Deleted Successfully']);
    }

    public function getProfile()
    {
        $c_id = Auth::guard('Company')->user()->id;

        $company = Company::find($c_id);

        return view('frontend.company.profile', compact('company'));

    }

    public function UpdateProfile(Request $request, $id)
    {
        // `id`, `company_name`, `address`, `username`, `business_type`,
        // `website`, `hashedcode`, `password`, `founder_date`
        $this->validate($request, [
            'company_name'  =>  'required',
            'address'       =>  'required',
            'username'      =>  'required|email',
            'business_type' =>  'required',
            'password'      =>  'required',
            'website'       =>  'url',
            'founder_date'  =>  'required|date',
        ]);
        $company = Company::find($id);
        $company->company_name  = $request['company_name'];
        $company->address       = $request['address'];
        $company->username      = $request['username'];
        $company->website = $request['website'];
        $company->business_type       = $request['business_type'];
        $company->password      = $request['password'];
        $company->founder_date  = $request['founder_date'];
        $company->save();

        return redirect()->back()->with(['message' => 'The Company Profile Has Been Updated Successfully']);


    }

}
