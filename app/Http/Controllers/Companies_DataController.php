<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CompanyData;

class Companies_DataController extends Controller
{
    public function index()
    {
        $companydata = CompanyData::all();
        return view('backend.pages.companiesdata.companies', compact('companydata'));
    }
    public function getcreate()
    {
        return view('backend.pages.companiesdata.companies-create');
    }
    public function create(Request $request)
    {
        $c = new CompanyData();
        $c->name = $request['name'];
        $c->email = $request['email'];
        $c->address = $request['address'];
        $c->phones = $request['phones'];
        $c->website = $request['website'];
        $c->business_type_d = $request['business_type'];
        $c->save();

        return redirect()->back()->with(['message' => 'The DataCompany Added Successfully']);
    }
    public function viewUpdate($id)
    {
        $companydata = CompanyData::find($id);
        return view('backend.pages.companiesdata.companies-update', compact('companydata'));
    }
    public function update(Request $request, $id)
    {
        $c = new CompanyData();
        $c->name = $request['name'];
        $c->email = $request['email'];
        $c->address = $request['address'];
        $c->phones = $request['phones'];
        $c->website = $request['website'];
        $c->business_type_d = $request['business_type'];
        $c->save();

        return redirect()->back()->with(['message' => 'The DataCompany Added Successfully']);
    }
    public function delete($id)
    {
        $c = CompanyData::find($id);
        $c->delete();
        return redirect()->back()->with(['message' => 'The DataCompany Deleted Successfully']);
    }
}
