<?php

namespace App\Exports;

use App\Models\Device;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DeviceExportView implements FromView
{
    public function view(): View
    {
        return view('exports.devicesView', [
            'devices' => Device::all()
        ]);
    }
}
