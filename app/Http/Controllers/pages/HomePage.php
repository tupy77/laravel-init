<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Device, Type, So};
//use App\Models\Type;
//use App\Models\So;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomePage extends Controller
{
  public function index()
  {
    //SI ALGUIEN ENTRA EN LA PAGINA PRINCIPAL SIN TENER ROL SE LE ASIGNA AUTOMATICAMENTE EL DE USER
    $user = Auth::user();
    $roleifexist = DB::table('model_has_roles')->where('model_id', $user->id)->first();
    if(!$roleifexist){
      DB::table('model_has_roles')->insert([
        'role_id' => 2, //el dos en la tabla de roles es user
        'model_type' => 'App\Models\User',
        'model_id' => $user->id
      ]);
    }

    $sos = So::where('active', true)->count();
    $Type = Type::where('active', true)->count();
    $Device = Device::where('active', true)->count();



    return view('content.pages.pages-home', [ 'n_sos'=> $sos ,  'n_type'=> $Type, 'n_device'=> $Device]);
  }
}
