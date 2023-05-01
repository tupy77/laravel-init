<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\so;
use Illuminate\Support\Facades\Hash;

class sos extends Controller
{
  public function index()
  {
    $sos = so::all();
    return view('content.pages.pages-sos',['sos'=>$sos]);
  }

  public function create()
  {
    return view('content.pages.pages-sos-create');
  }

  public function store(Request $request)
  {
    $validator = $request->validate([
        'name' =>'required',
      ]);

    $so = new so();
    $so->name = $request->name;
    $so->version = $request->version;
    $so->description = $request->description;
    if ($request->active)
      $so->active = $request->active;
    $so->save();

    return redirect()->route('pages-sos');
  }

  public function show($so_id){

    $so = so::find($so_id);
    return view('content.pages.pages-sos-show',['so'=>$so]);
  }

   public function update(Request $request)
   {
    $so = so::find($request->so_id);
    $so->name = $request->name;
    $so->version = $request->version;
    $so->description = $request->description;
    $so->active = $request->active;
    $so->save();
    return redirect()->route('pages-sos');
   }

   public function destroy($so_id){
    $so = so::find($so_id);
    $so->delete();
    return redirect()->route('pages-sos');
   }

   public function switch($so_id)
   {
    $so = so::find($so_id);
    $so->active =!$so->active;
    $so->save();
    return redirect()->route('pages-sos');
   }

}
