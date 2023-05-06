<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Device;
use Illuminate\Support\Facades\Auth;


class Reports extends Controller
{
  public function index(){
    $reports = Report::all();

    return view('content.pages.reports', ['reports' => $reports]);
  }

  public function create(){
    $devices = Device::all();

    $date = date('Y-m-d_H-i-s');

    $user = Auth::user()->name;//EXTRAER NOMBRE DE USUARIO DE LA SESION
    $filename = $user.'_'.$date.'_devices_report.pdf';

    $pdf = Pdf::loadView('pdf.devices', ['devices' => $devices]);
    // $pdf = Pdf::loadView('pdf.devices', compact('devices')); //MANERA ALTERNATIVA

    //GUARDAR PDF EN STORAGE
    Storage::put('public/pdf/'.$filename,$pdf->output()) ;

    $report=new Report();
    $report->url=$filename;
    $report->save();

    //return $pdf->download($filename);
    return redirect()->route('pages-reports');
  }

  public function delete($id){
    $report = Report::find($id);
    Storage::delete('public/pdf/'.$report->url);

    $report->delete();
    return redirect()->route('pages-reports');
  }

}
