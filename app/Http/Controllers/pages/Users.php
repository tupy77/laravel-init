<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Users extends Controller
{
  public function index()
  {
    $users = User::all();
    return view('content.pages.pages-users',['users'=>$users]);
  }

  public function create()
  {
    return view('content.pages.pages-users-create');
  }

  public function store(Request $request)
  {
    $validator = $request->validate([
        'name' =>'required|max:255',
        'email' =>'required|email|unique:users',
        'password' =>'required|min:6|confirmed',
      ]);
    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);

    return redirect()->route('pages-users');
  }

  public function show($user_id){
    $user = User::find($user_id);
    return view('content.pages.pages-users-show',['user'=>$user]);
  }

   public function update(Request $request)
   {
    $user = User::find($request->user_id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();
    return redirect()->route('pages-users');
   }

   public function destroy($user_id){
    $user = User::find($user_id);
    $user->delete();
    return redirect()->route('pages-users');
   }


}
