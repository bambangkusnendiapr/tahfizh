<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Kelas;
use App\Models\Santri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $waktu = now()->format('d.m.Y H:i:s');
        // return $waktu;
        if(Auth::user()->isAbleTo('kelas-read')) {
            $kelas = Kelas::get();
            return view('admin.kelas.index', compact('kelas'));
        }
        return $this->_akses();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->_akses();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->isAbleTo('kelas-create')) {
            $this->validate($request, [
                'kelas' => ['required', 'string', 'max:255', 'unique:kelas_tb,kelas_nama']
            ]);
    
            $kelas = new Kelas;
            $kelas->kelas_nama = $request->kelas;
            $kelas->kelas_ket  = $request->ket;
            $kelas->kelas_warna  = $request->warna;
            $kelas->save();
    
            return redirect()->route('kelas.index')->with('success', 'Data Berhasil Disimpan');
        }
        return $this->_akses();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Kelas::find($id);
        if($kelas) {
            $santri = Santri::where('kelas_id', $id)->get();
            return view('admin.kelas.show', compact('santri', 'kelas'));
        }
        return redirect()->route('kelas.index')->with('warning', 'Data tidak ditemukan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->_akses();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->isAbleTo('kelas-update')) {
            $this->validate($request, [
                'kelas' => ['required', 'string', 'max:255', 'unique:kelas_tb,kelas_nama']
            ]);
    
            $kelas = Kelas::find($id);
            $kelas->kelas_nama = $request->kelas;
            $kelas->kelas_ket  = $request->ket;
            $kelas->save();
    
            return redirect()->route('kelas.index')->with('success', 'Data Berhasil Diedit');
        }
        return $this->_akses();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->isAbleTo('kelas-delete')) {
            $kelas = Kelas::find($id);
            $kelas->delete();
                
            return redirect()->route('kelas.index')->with('success', 'Data Berhasil Dihapus');    
        }

        return $this->_akses();
    }

    private function _akses() {
        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
    }
}
