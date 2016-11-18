<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jop;

class JopController extends Controller
{
    public function index()
    {
        $jops = Jop::all();
        return view('backend.pages.jops.jops', compact('jops'));
    }
    public function getcreate(Request $request)
    {
        return view('backend.pages.jops.jops-create');
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'content'  =>  'required|min:4',
        ]);
        $jop = new Jop();
        $jop->content  = $request['content'];
        $jop->save();

        return redirect()->back()->with(['message' => 'The Jop "'.$jop->content.'" Added Successfully']);

    }
    public function viewUpdate($id)
    {
        $jop = Jop::find($id);
        return view('backend.pages.jops.jops-update', compact('jop'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'content'  =>  'required',
        ]);
        $jop = Jop::find($id);
        $jop->content = $request['content'];
        $jop->save();

        return redirect()->back()->with(['message' => 'The Jop "'.$jop->content.'" Updated Successfully']);
    }
    public function delete($id)
    {
        $jop = Jop::find($id);
        $name = $jop->content;
        $jop->delete();
        return redirect()->back()->with(['message' => 'The Jop "'.$name.'" Deleted Successfully']);
    }
}
