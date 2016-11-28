<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Company;
use Response;

class APICompanyController extends Controller
{
    public function __construct(Company $company){

    	$this->company = $company;
    }

    public function allCompanies()
    {

        return Response::json(['result' => $this->company->all()],200);

    }


    public function getCompany($id)
    {
    	$company = $this->company->find($id);
    	if(!$company){
    		return Response::json(['response' => "Not Found!"], 400);
    	}
    	return Response::json(['result' => $company],200);
    }


    public function saveCompany(Request $request)
    {
        $company = new Company();
        $company->company_name  = $request['company_name'];
        $company->address       = $request['address'];
        $company->username      = $request['email'];
        $company->business_type = $request['business_type'];
        $company->phones        = $request['phones'];
        $company->website       = $request['website'];
        $company->password      = $request['password'];
        $company->founder_date  = $request['founder_date'];
        $company->save();
    	if(!$company){
    		return Response::json(['response' => "Error Updating The Comapny!"], 400);
    	}
    	return Response::json(['response' => "Updated Successfully!"], 200);
    }


    public function updateCompany(Request $request, $id)
    {
    	$company =  $this->company->find($id);
    	if(!$company){
    		return Response::json(['response' => "Error Updating The Comapny!"], 400);
    	}
    	return Response::json(['response' => "Updated Successfully!"], 200);
    }

}
