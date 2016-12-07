<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Company;
use App\BussnessType;
use App\Jop;
use Response;
class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchResults = '';
        $searchResultsCompany = '';

        $this->validate($request, [
            'search' => 'required',
        ]);
        // get the search key word
        $searchWord = $request['search'];
        //get the fillter value
        $searchType = $request['fillter'];
        // person define
        if ($request->searchType == 0) {
            if ($searchType == 'name') {
                // get the matched data
                $searchResults = User::where(function($q) use ($searchWord) {
                    $q->where("firstname" , 'like', "%$searchWord%"); // search by firstname
                    $q->orWhere("lastname" , 'like', "%$searchWord%"); // search by lastname
                    $q->orWhere("username" , 'like', "%$searchWord%"); // search by username
                })
                ->orderBy('firstname', 'ASC')->get();
            } elseif($searchType == 'Job'){
                // join to get the users that related to the job by advanced join
                $searchResults = jop::join('users', function($j) use($searchWord) {
                    $j->on('users.jop_id', '=', 'jops.id')
                    ->where('jops.content', 'like', "$searchWord%");
                })
                ->get();
            } else {
                // get the matched data
                $searchResults = User::where("$searchType" , 'like', "$searchWord%")
                ->orderBy('firstname', 'ASC')->get();
            }
            // return the data
            return view('search', compact('searchResults'));

        }
        // company define
        if ($request->searchType == 1) {
            if ($searchType == 'name') {
                // get the matched data
                $searchResultsCompany = Company::where('company_name', 'like', "$searchWord%")
                ->orderBy('company_name', 'ASC')->get();
            }elseif($searchType == 'Job'){
                // join to get the users that related to the job by advanced join
                $searchResultsCompany = BussnessType::join('companies', function($j) use($searchWord) {
                    $j->on('companies.business_type', '=', 'bussness_types.id')
                    ->where('bussness_types.bussness_type', 'like', "$searchWord%");
                })
                ->get();
            }elseif($searchType == 'email') {
                // get the matched data
                $searchResultsCompany = Company::where('username', 'like', "$searchWord%")->orderBy('company_name', 'ASC')->get();
            }

            // return the data
            return view('search', compact('searchResultsCompany'));
        }
    }
    public function searchAjax(Request $request)
    {
        $searchResults = '';

        $AjaxResult = '';
        // get the search key word
        $searchWord = $request['body'];
        //get the fillter value
        $searchType = $request['fillter'];
        // persone define
        if ($request->type == 0) {
            if ($searchType == 'name') {
                // get the matched data
                $searchResults = User::where(function($q) use ($searchWord) {
                    $q->where("firstname" , 'like', "$searchWord%");
                    $q->orWhere("lastname" , 'like', "$searchWord%");
                    $q->orWhere("username" , 'like', "$searchWord%");
                })
                ->orderBy('firstname', 'ASC')->get();

            }elseif($searchType == 'Job'){
                // get the users by join with the jobs table
                $searchResults = jop::join('users', function($j) use($searchWord) {
                    $j->on('users.jop_id', '=', 'jops.id')
                    ->where('jops.content', 'like', "$searchWord%");
                })
                ->get();
            }else {

                // get the matched data
                $searchResults = User::where("$searchType" , 'like', "$searchWord%")
                ->orderBy('firstname', 'ASC')->get();
            }

            // loop the data
            foreach($searchResults as $results){
                $AjaxResult .=
                '
                <div class="userInfo">
                    <h4 class="fullName"><i class="fa fa-user"></i> '. $results->firstname .' '. $results->lastname .'</h4>';
                    $AjaxResult .=' <h4 class="num"><i class="fa fa-phone"></i> '. $results->phone .'</h4>';
                    $AjaxResult .='<h4 class="email"><i class="fa fa-envelope"></i> '. $results->email .'</h4>
                    ';
                    $AjaxResult .= '
                    <h4 class="email"><i class="fa fa-briefcase"></i> '.\App\Jop::where('id', $results->jop_id)->first()->content .'</h4>
                </div>
                ';
            }
            // return the response by json
            return response()->json(['results' => $AjaxResult], 200);
        }
        // company define
        if ($request->type == 1) {
            if ($searchType == 'name') {
                // get the matched data
                $searchResultsCompany = Company::where('company_name', 'like', "$searchWord%")
                ->orderBy('company_name', 'ASC')->get();
            }elseif($searchType == 'email') {
                // get the matched data
                $searchResultsCompany = Company::where('username', 'like', "$searchWord%")->orderBy('company_name', 'ASC')->get();
            }elseif($searchType == 'Job'){
                // join to get the users that related to the job by advanced join
                $searchResultsCompany = BussnessType::join('companies', function($j) use($searchWord) {
                    $j->on('companies.business_type', '=', 'bussness_types.id')
                    ->where('bussness_types.bussness_type', 'like', "$searchWord%");
                })
                ->get();
            }

            // loop the data
            foreach($searchResultsCompany as $results){
                $AjaxResult .=
                '
                <div class="userInfo">
                    <h4 class="fullName"><i class="fa fa-user"></i> '. $results->company_name .'</h4>';
                    $AjaxResult .='<h4 class="email"><i class="fa fa-envelope"></i> '. $results->username .'</h4>
                    ';
                    $AjaxResult .=' <h4 class="num"><i class="fa fa-briefcase"></i> '.\App\BussnessType::where('id', $results->business_type)->first()->bussness_type .'</h4>';
                    $AjaxResult .= '</div>';
                }
                // return the response by json
                return response()->json(['results' => $AjaxResult], 200);
            }
        }

        public function getResult(Request $request)
        {
            // search_about **
            // search_by **
            // search_word **
            $searchWord = $request['search_word'];
            if ($request['search_about'] == 'person') {
                if ($request['search_by'] == 'name') {
                    $searchResults = User::select("id","username","firstname","lastname","phone","email","age","gender","hashedcode","jop_id")->where(function($q) use ($searchWord) {
                        $q->where("firstname" , 'like', "%$searchWord%"); // search by firstname
                        $q->orWhere("lastname" , 'like', "%$searchWord%"); // search by lastname
                        $q->orWhere("username" , 'like', "%$searchWord%"); // search by username
                    })
                    ->orderBy('firstname', 'ASC')->get();
                } elseif($request['search_by'] == 'Job'){
                    $searchResults = Jop::join('users', function($j) use($searchWord) {
                        $j->on('users.jop_id', '=', 'jops.id')
                        ->where('jops.content', 'like', "%$searchWord%");
                    })->select("users.id","username","firstname","lastname","phone","email","age","gender","jop_id")
                    ->get();
                } elseif($request['search_by'] == 'email'){
                    $searchResults = User::select("id","username","firstname","lastname","phone","email","age","gender","jop_id")->
                    where("email" , 'like', "$searchWord%")
                    ->orderBy('firstname', 'ASC')->get();
                } elseif($request['search_by'] == 'phone'){
                    $searchResults = User::select("id","username","firstname","lastname","phone","email","age","gender","jop_id")
                    ->where("phone" , 'like', "$searchWord%")
                    ->orderBy('firstname', 'ASC')->get();
                }
                return Response::json(['result' => $searchResults], 200);
            }

            if ($request['search_about'] == 'company') {

                if ($request['search_by'] == 'name') {
                    $searchResultsCompany = Company::where('company_name', 'like', "%$searchWord%")
                    ->orderBy('company_name', 'ASC')->get();
                } elseif($request['search_by'] == 'bussness'){
                    $searchResultsCompany = BussnessType::join('companies', function($j) use($searchWord) {
                        $j->on('companies.business_type', '=', 'bussness_types.id')
                        ->where('bussness_types.bussness_type', 'like', "%$searchWord%");
                    })
                    ->orderBy('company_name', 'ASC')
                    ->get();
                } elseif($request['search_by'] == 'email'){
                    $searchResultsCompany = Company::where('username', 'like', "%$searchWord%")
                    ->orderBy('company_name', 'ASC')
                    ->get();
                }
                return Response::json(['result' => $searchResultsCompany],200);

            }
        }
    }
