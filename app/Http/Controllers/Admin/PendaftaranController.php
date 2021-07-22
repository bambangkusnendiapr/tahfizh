<?php

namespace App\Http\Controllers\Admin;

use App\Models\Santri;
use App\Models\Master\Kelas;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function index()
    {
        if(Auth::user()->isAbleTo('pendaftaran-read')) {
            $santri = Santri::where('santri_konfirmasi', 'belum')->orderBy('id', 'DESC')->get();
            $kelas = Kelas::get();
            return view('admin.pendaftaran.index', compact('santri', 'kelas'));
        }

        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
    }

    public function konfirmasi(Request $request, $id)
    {
        //cari santri
        $santri = Santri::find($id);
        //update kolom konfirmasi dan surat_id supaya ga error
        $santri->santri_konfirmasi = 'sudah';
        $santri->surat_id = 1;
        $santri->kelas_id = $request->kelas;
        //simpan
        $santri->save();

        $user = User::find($request->user_id);

        $roles = $user->roles;

        foreach ($roles as $role) {
            $user->detachRole($role);
        }

        $user->attachRole('santri');

        return redirect()->route('pendaftaran')->with('success', 'Konfirmasi Santri Berhasil');
    }
}
