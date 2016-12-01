<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Company;
use Response;
use App\CompanyData;
use BussnessType;
use Auth;

class APICompanyController extends Controller
{
    public function __construct(Company $company){

    	$this->company = $company;
    }

    public function allCompanies()
    {

        return Response::json(['result' => $this->company->all()],200);

    }

    public function loginCompany(Request $request)
    {
        if (count(Company::where('hashedcode', $request['hashedcode'])->first()) > 0) {
            return Response::json(['response' => "Found"], 200);
        }else {
            return Response::json(['response' => "Not Found"], 400);
        }
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
        if (count(BussnessType::where('bussness_type', $request['business_type'])) == 0) {
            $bt = new BussnessType();
            $bt->bussness_type = $request['founder_date'];
            $bt->save();
            $company->business_type = $bt->id;
        }elseif (count(BussnessType::where('bussness_type', $request['business_type'])) > 0) {
            $bt = BussnessType::where('bussness_type', $request['business_type'])->get();
            $company->business_type = $bt->id;
        }
        $company->business_type = $request['business_type'];
        $company->phones        = $request['phones'];
        $company->website       = $request['website'];
        $company->password      = bcrypt($request['password']);
        $company->founder_date  = $request['founder_date'];
        $company->save();

        $company_name = str_split($company->company_name, 3);
        $hashcode = '@' . $company->id . $company_name[0] . rand(0, 1000);
        $company2 = Company::find($company->id);
        $company2->hashedcode = $hashcode;
        $company2->save();

    	if(!$company){
    		return Response::json(['response' => "Error Saveing The Comapny!"], 400);
    	}
    	return Response::json(['response' => "Saved Successfully!"], 200);
    }

    public function updateCompany(Request $request, $id)
    {
        $company =  $this->company->find($id);
        $company->company_name  = $request['company_name'];
        $company->address       = $request['address'];
        $company->username      = $request['email'];
        $company->business_type = $request['business_type'];
        $company->phones        = $request['phones'];
        $company->website       = $request['website'];
        $company->password      = bcrypt($request['password']);
        $company->founder_date  = $request['founder_date'];
        $company->save();

    	if(!$company){
    		return Response::json(['response' => "Error Updating The Comapny!"], 400);
    	}
    	return Response::json(['response' => "Updated Successfully!"], 200);
    }

    public function getCompanyData()
    {
        $company_data = CompanyData::all();
        if(!$company_data){
    		return Response::json(['response' => "Not Found!"], 400);
    	}
    	return Response::json(['result' => $company_data],200);
    }


    public function saveBase64ToImage($image) {
        $path = base_path('');
        //$base = $_REQUEST['image'];
        $base = $image;
        $binary = base64_decode($base);
        //$binary = base64_decode(urldecode($base));
        header('Content-Type: bitmap; charset=utf-8');

        $f = finfo_open();
        $mime_type = finfo_buffer($f, $binary, FILEINFO_MIME_TYPE);
        $mime_type = str_ireplace('image/', '', $mime_type);

        $filename = md5(\Carbon\Carbon::now()) . '.' . $mime_type;
        $file = fopen($path . $filename, 'wb');
        if (fwrite($file, $binary)) {
            return $filename;
        } else {
            return FALSE;
        }
        fclose($file);
    }

}
