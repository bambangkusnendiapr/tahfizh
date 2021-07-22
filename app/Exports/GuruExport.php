<?php

namespace App\Exports;

use App\Models\Guru;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GuruExport implements FromView
{
    public function view(): View
    {
        $data['guru'] = Guru::where('user_id', '!=', 1)->get();
        return view('admin.laporan.guru', $data);
    }
}
