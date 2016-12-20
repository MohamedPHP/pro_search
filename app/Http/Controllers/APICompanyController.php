<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Company;
use Response;
use App\CompanyData;
use App\BussnessType;
use Auth;
use DB;

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
            $companyData = Company::where('hashedcode', $request['hashedcode'])->first();
            $bussness = BussnessType::where('id', $companyData->business_type)->first();
            return Response::json(['response' => $companyData, 'bussnessType' => $bussness->bussness_type, 'status' => 'Found'], 200);
        }else {
            return Response::json(['status' => "Not Found"], 200);
        }
    }


    public function getCompany($id)
    {
        $company = $this->company->find($id);
        if(!$company){
            return Response::json(['response' => "Not Found!"], 200);
        }
        return Response::json(['result' => $company],200);
    }


    public function saveCompany(Request $request)
    {
        $company = new Company();
        $company->company_name  = $request['company_name'];
        $company->address       = $request['address'];
        $company->username      = $request['email'];
        if (count(BussnessType::where('bussness_type', $request['business_type'])->get()) == 0) {
            $bt = new BussnessType();
            $bt->bussness_type = $request['business_type'];
            $bt->save();
            $company->business_type = $bt->id;
        }elseif (count(BussnessType::where('bussness_type', $request['business_type'])->get()) > 0) {
            $bt = BussnessType::where('bussness_type', $request['business_type'])->first();
            $company->business_type = $bt->id;
        }
        $company->phones        = $request['phones'];
        $company->website       = $request['website'];
        $company->password      = bcrypt($request['password']);
        $company->founder_date  = $request['founder_date'];
        $company->image  = 'src/images/logo.png';
        $company->save();

        $company_name = str_split($company->company_name, 3);
        $hashcode = '@' . $company->id . $company_name[0] . rand(0, 1000);
        $company2 = Company::find($company->id);
        $company2->hashedcode = $hashcode;
        $company2->save();

        if(!$company){
            return Response::json(['status' => "Error"], 200);
        }
        $data = DB::table('companies')
            ->join('bussness_types', 'companies.business_type', '=', 'bussness_types.id')
            ->where('companies.id', '=', $company->id)
            // determine the cols that i want
            ->select("companies.id","companies.company_name",
                     "companies.address","companies.username",
                     "companies.phones","companies.website",
                     "companies.image","bussness_types.bussness_type as business_type",
                     "companies.founder_date", "companies.hashedcode")
            ->first();
        return Response::json(['response' => $data, "status" => "Saved"], 200);
    }

    public function updateCompany(Request $request)
    {
        $company =  $this->company->find($request['id']);
        $company->company_name  = $request['company_name'];
        $company->address       = $request['address'];
        $company->username      = $request['email'];
        if (count(BussnessType::where('bussness_type', $request['business_type'])->get()) == 0) {
            $bt = new BussnessType();
            $bt->bussness_type = $request['business_type'];
            $bt->save();
            $company->business_type = $bt->id;
        }elseif (count(BussnessType::where('bussness_type', $request['business_type'])->get()) > 0) {
            $bt = BussnessType::where('bussness_type', $request['business_type'])->first();
            $company->business_type = $bt->id;
        }
        $company->phones        = $request['phones'];
        $company->website       = $request['website'];
        $company->password      = bcrypt($request['password']);
        $company->founder_date  = $request['founder_date'];
        $company->save();

        if(!$company){
            return Response::json(['status' => "Error"], 200);
        }
        return Response::json(['status' => "Updated"], 200);
    }

    public function getCompanyData()
    {
        $company_data = CompanyData::all();
        if(!$company_data){
            return Response::json(['response' => "Not Found!"], 200);
        }
        return Response::json(['result' => $company_data],200);
    }

    public function imgaeUpload(Request $request)
    {
        //Checks if request has file or not
        if ($request->hasFile('image')) {
            //checks if file is uploaded or not
            if ($request->file('image')->isValid()) {

                $company = Company::find($request['id']);

                $extension = $request->file('image')->getClientOriginalExtension();
                $sha1 = sha1($request->file('image')->getClientOriginalName());
                $filename = date('Y-m-d-h-i-s')."_".$sha1.".".$extension;
                // this path is for the server but in the local you need to make public_path() function
                $path  = '/home7/deziquec/public_html/professearch/'.'src/images/companies/';
                if ($company->image == 'src/images/logo.png') {
                    $image = 'src/images/companies/'.$filename;
                }elseif ($company->image != 'src/images/logo.png') {
                    $pathUnlink  = '/home7/deziquec/public_html/professearch/' . $company->image;
                    unlink($pathUnlink);
                    $image = 'src/images/companies/' . $filename;
                }
                $request->file('image')->move($path, $filename);
                $company->image = $image;
                $company->save();

                if(!$company){
                    return Response::json(['response' => "Error Updating The User Image!"], 200);
                }

                return Response::json(['response' => "Image Updated Successfully!"], 200);

            }else {
                return Response::json(['response' => "Image Is Not Valid!"], 200);
            }
        }else {
            return Response::json(['response' => "You did't Send Any Files!"], 200);
        }

    }



    public function passCheck(Request $request)
    {
        $id = $request['id'];
        $pass = $request['password'];

        $company = $this->company->find($id);

        if (Auth::guard('Company')->attempt(['password' => $pass])) {
            return Response::json(['passOk' => "correct"], 200);
        }
        return Response::json(['passOk' => "not correct"], 200);
    }


}
