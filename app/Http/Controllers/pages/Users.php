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


    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);


    return redirect()->route('pages-users');
  }
}
