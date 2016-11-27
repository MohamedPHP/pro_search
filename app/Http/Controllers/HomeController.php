<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jop;
class HomeController extends Controller
{

  public function index()
  {
    $jobs = Jop::all();
    return view('index', compact('jobs'));
  }
}
