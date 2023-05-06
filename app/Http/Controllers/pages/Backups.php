<?php

namespace App\Http\Controllers\pages;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Backup;
use Illuminate\Support\Facades\Auth;
use App\Jobs\BackupProcess;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class Backups extends Controller
{
  public function index(){
    $backups = Backup::all();
    return view('content.pages.pages-backups', compact('backups'));
  }

  public function create(){

    BackupProcess::dispatch();

    return redirect()->route('pages-backups');
  }

  public function delete($id){
    $backup = backup::find($id);

    $createdAt = Carbon::parse($backup->created_at)->format('Y-m-d_H-i-s');

    Storage::delete('public/backups/'.$createdAt.'_inventario_backup.sql');

    $backup->delete();
    return redirect()->route('pages-backups');
  }

  public function download($created_at){

    $createdAt = Carbon::parse($created_at)->format('Y-m-d_H-i-s');
    $ruta = storage_path().'\app\public\backups\\'.$createdAt.'_inventario_backup.sql';

    return response()->download($ruta);
  }

}
