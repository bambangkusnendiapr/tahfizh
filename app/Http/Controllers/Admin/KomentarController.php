<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Komentar;
use App\Models\Artikel;

class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama'      => 'required',
            'email'     => 'required|email',
            'no'        => 'required',
            'komentar'  => 'required'
        ],
        [
            'nama.required'     => 'Nama harus diisi',
            'email.required'    => 'Nama harus diisi',
            'email.email'       => 'Isi dengan format email',
            'no.required'       => 'Nama harus diisi',
            'komentar.required' => 'Nama harus diisi',
        ]);

        // $artikel = Artikel::find($request->id_artikel);

        $komentar = new Komentar;

        $komentar->komentar_nama    = $request->nama;
        $komentar->komentar_email   = $request->email;
        $komentar->komentar_no      = $request->no;
        $komentar->komentar_isi     = $request->komentar;
        $komentar->artikel_id       = $request->id_artikel;

        $komentar->save();

        // return redirect()->route('front.artikel.single', $artikel->artikel_slug)->with('success', 'Komentar Berhasil Diberikan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $komentar = Komentar::find($id);
        $artikel_id = $komentar->artikel_id;
        
        $komentar->delete();
        
        return redirect()->route('artikel.show', $artikel_id)->with('success', 'Data Berhasil Dihapus');
    }
}
