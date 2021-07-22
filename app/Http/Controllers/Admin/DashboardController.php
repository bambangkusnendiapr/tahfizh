<?php

namespace App\Http\Controllers\Admin;

use App\Models\Santri;
use App\Models\Guru;
use App\Models\Buku;
use App\Models\Master\Surat;
use App\Models\Master\Juz;
use App\Models\Master\Nilai;
use App\Models\Master\Kelas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('user')) {
            return view('admin.dashboard.user');
        } else if(Auth::user()->hasRole('santri')) {
            $santri     = Santri::where('santri_konfirmasi', 'sudah')->get();
            $guru       = Guru::where('user_id', '!=', 1)->get();
            $santri_id  = Santri::where('user_id', Auth::user()->id)->first();
            $buku       = Buku::where('santri_id', $santri_id->id)->orderBy('buku_tgl', 'DESC')->get();
            $surat      = Surat::get();
            $juz        = Juz::get();
            $nilai      = Nilai::get();
            $santri_surat = \DB::table('santri_surat')->where('santri_id', $santri_id->id)->get();
            $juz_santri = \DB::table('juz_santri')->where('santri_id', $santri_id->id)->get();
            $kelas      = Kelas::get();
            return view('admin.dashboard.santri', compact('santri', 'guru', 'buku', 'surat', 'santri_id', 'santri_surat', 'juz', 'juz_santri', 'nilai', 'kelas'));
        } else if(Auth::user()->hasRole('superadmin')) {
            return view('admin.dashboard.user');   
        }

        $santri     = Santri::get();
        $guru       = Guru::where('user_id', '!=', 1)->get();
        $guru_id    = Guru::where('user_id', Auth::user()->id)->first();
        $buku       = Buku::where('guru_id', $guru_id->id)->get();
        $kelas      = Kelas::get();
        $nilai      = Nilai::get();
        $santri_surat = \DB::table('santri_surat')->get();
        $juz_santri = \DB::table('juz_santri')->get();
        $surat      = Surat::get();
        $juz        = Juz::get();
        return view('admin.dashboard.guru', compact('santri', 'guru', 'buku', 'kelas', 'nilai', 'santri_surat', 'surat', 'juz_santri', 'juz'));
    }
}
