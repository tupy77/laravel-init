<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $role1 = Role::firstOrCreate(['name' => 'admin']);
      $role2 = Role::firstOrCreate(['name' => 'user']);

      $user = User::find(1); //ASIGNAR DESDE CODIGO UN USUARIO CON UN ROL (EN ESTE CASO ADMIN)
      $user->assignRole($role1);
      $user = User::find(2);
      $user->assignRole($role2);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
};
