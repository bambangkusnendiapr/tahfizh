<?php

namespace App\Exports;

use App\Models\Santri;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SantriExport implements FromView
{
    public function view(): View
    {
        $data['santri'] = Santri::where('santri_konfirmasi', 'sudah')->get();
        return view('admin.laporan.santri', $data);
    }
}
