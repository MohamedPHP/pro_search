<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\BussnessType;

class Bussness_typesController extends Controller
{
    public function index()
    {
        $bs = BussnessType::all();
        return view('backend.pages.bussnesstypes.bussnesstypes', compact('bs'));
    }
    public function getcreate()
    {
        return view('backend.pages.bussnesstypes.bussnesstypes-create');
    }
    public function create(Request $request)
    {

        $this->validate($request, [
            'bussness_type' => 'required|unique:bussness_types',
        ]);


        $b = new BussnessType();
        $b->bussness_type = $request['bussness_type'];
        $b->save();

        return redirect()->back()->with(['message' => 'Bussness Type Added Successfully']);
    }
    public function viewUpdate($id)
    {
        $b = BussnessType::find($id);
        return view('backend.pages.bussnesstypes.bussnesstypes-update', compact('b'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'bussness_type' => 'required',
        ]);

        $b = BussnessType::find($id);
        $b->bussness_type = $request['bussness_type'];
        $b->save();

        return redirect()->back()->with(['message' => 'Bussness Type Updated Successfully']);
    }
    public function delete()
    {
        # code...
    }
}
