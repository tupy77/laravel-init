<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Device;


class Reports extends Controller
{
  public function index(){
    $reports = Report::all();

    return view('content.pages.reports', ['reports' => $reports]);
  }

  public function create(){
    $devices = Device::all();
    $pdf = Pdf::loadView('pdf.devices', ['devices' => $devices]);
    // $pdf = Pdf::loadView('pdf.devices', compact('devices')); //MANERA ALTERNATIVA
    return $pdf->download('invoice.pdf');
    //return redirect()->route('pages-reports');
  }

  public function delete($id){
    $report = Report::find($id);
    Storage::delete('public/reports/'.$report->url);

    $report->delete();
    return redirect()->route('pages-reports');
  }

}
