<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\BussnessType;
use App\Jop;
use Response;

class APIJopAndBTController extends Controller
{
    public function __construct(BussnessType $bt, Jop $jop){

        $this->bt = $bt;
        $this->jop = $jop;
    }

    public function allBts()
    {

        return Response::json(['result' => $this->bt->all()],200);

    }

    public function getBt($id)
    {
        $bt = $this->bt->find($id);
        if(!$bt){
            return Response::json(['response' => "Not Found!"], 400);
        }
        return Response::json(['result' => $bt],200);
    }
    public function allJops()
    {

        return Response::json(['result' => $this->jop->all()],200);

    }

    public function getJop($id)
    {
        $jop = $this->jop->find($id);
        if(!$company){
            return Response::json(['response' => "Not Found!"], 400);
        }
        return Response::json(['result' => $jop],200);
    }
}
