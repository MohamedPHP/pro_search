<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Company;
use Illuminate\Support\Facades\Auth;

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
            'email'         =>  'required|email',
            'business_type' =>  'required',
            'website'       =>  'required|url',
            'password'      =>  'required|confirmed|min:6',
            'founder_date'  =>  'required',
        ]);
        $company = new Company();
        $company->company_name  = $request['company_name'];
        $company->address       = $request['address'];
        $company->email         = $request['email'];
        $company->business_type = $request['business_type'];
        $company->website       = $request['website'];
        $company->password      = bcrypt($request['password']);
        $company->founder_date  = $request['founder_date'];
        $company->save();

        $hashcode = '#' . $company->id . $company->company_name . rand(0, 1000);


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
            'email'         =>  'required|email',
            'business_type' =>  'required',
            'website'       =>  'required|url',
            'password'      =>  'required|min:6',
            'founder_date'  =>  'required',
        ]);
        $company = Company::find($id);
        $company->company_name  = $request['company_name'];
        $company->address       = $request['address'];
        $company->email         = $request['email'];
        $company->business_type = $request['business_type'];
        $company->website       = $request['website'];
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


    public function companyRegister()
    {

    }



}
