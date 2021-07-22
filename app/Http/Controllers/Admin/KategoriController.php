<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAbleTo('kategori-read')) {

            $kategori = Kategori::get();
            return view('admin.kategori.index', compact('kategori'));

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
        $this->validate($request, [
            'kategori' => ['required', 'string', 'max:255', 'unique:kategori_tb,kategori_nama'],
        ]);

        Kategori::create([
            'kategori_nama' => $request->input('kategori'),
            'kategori_ket' => $request->input('ket'),
        ]);

        return redirect()->route('kategori.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->_akses();
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
        $kategori = Kategori::find($id);
        if(!empty($kategori)) {
            $this->validate($request, [
                'kategori' => ['required', 'string', 'max:255', 'unique:kategori_tb,kategori_nama,' . $id],
            ]);

            $kategori->update([
                'kategori_nama' => $request->input('kategori'),
                'kategori_ket' => $request->input('ket'),
            ]);

            return redirect()->route('kategori.index')->with('success', 'Data Berhasil Diedit');
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
        $kategori = Kategori::find($id);
        if(!empty($kategori)) {
            $kategori->delete();
            
            return redirect()->route('kategori.index')->with('success', 'Data Berhasil Dihapus');
        }
        return $this->_akses();
    }

    private function _akses() {
        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
    }
}
