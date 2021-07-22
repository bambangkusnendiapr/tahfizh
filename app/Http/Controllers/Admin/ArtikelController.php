<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Kategori;
use App\User;
use App\Models\Master\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use File;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAbleTo('artikel-read')) {
            $user = User::get();
            $artikel = Artikel::get();
            return view('admin.artikel.index', compact('artikel', 'user'));

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
        if(Auth::user()->isAbleTo('artikel-create')) {
            $kategori = Kategori::get();
            $tag = Tag::get();
            $user = User::get();
            return view('admin.artikel.create', compact('kategori', 'tag', 'user'));

        }
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
            'tgl' => ['required', 'date'],
            'kategori' => ['required'],
            'judul' => ['required', 'string', 'max:255'],
            'isi' => ['required'],
            'tag' => ['required'],
            'filefoto' => 'required|mimes:jpeg,jpg,png,gif|max:4000' // max 4000kb
        ],
        [
            'judul.required' => 'Harus diisi',
            'isi.required' => 'Harus diisi',
            'tag.required' => 'Tag harus diisi',
            'filefoto.required' => 'Harus diisi',
            'filefoto.mimes' => 'Harus diisi jpeg/jpg/png/gif',
            'filefoto.max' => 'Maksimal 4 MB'
        ]);

        $artikel = new Artikel;
        $artikel->artikel_tgl    = $request->tgl;
        $artikel->artikel_slug   = time().Str::slug($request->judul, '-');
        $artikel->artikel_judul  = $request->judul;
        $artikel->artikel_isi    = $request->isi;
        $artikel->user_id        = Auth::user()->id;
        $artikel->kategori_id    = $request->kategori;
        $artikel->penulis        = $request->penulis;

        if($request->hasFile('filefoto') == true){
    
            $file2 = $request->file('filefoto');
            $namafile2 = time()."".$file2->getClientOriginalName();
    
            $tujuan_upload = 'images/artikel/';
            $file2->move($tujuan_upload,$namafile2);
            $artikel->artikel_gambar = $namafile2;

        }

        $artikel->save();
        $artikel->tag()->attach($request->tag);

        return redirect()->route('artikel.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->isAbleTo('artikel-read')) {
            $user = User::get();
            $artikel = Artikel::find($id);
            if($artikel) {
                return view('admin.artikel.detail', compact('artikel', 'user'));
            }
            return redirect()->route('artikel.index')->with('warning', 'Data tidak ditemukan');
        }
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
        if(Auth::user()->isAbleTo('artikel-update')) {
            $kategori = Kategori::get();
            $tag = Tag::get();
            $user = User::get();
            $artikel = Artikel::find($id);
            if($artikel) {
                return view('admin.artikel.edit', compact('kategori', 'tag', 'user', 'artikel'));
            }
            return redirect()->route('artikel.index')->with('warning', 'Data tidak ditemukan');

        }
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
        $this->validate($request, [
            'tgl' => ['required', 'date'],
            'kategori' => ['required'],
            'judul' => ['required', 'string', 'max:255'],
            'isi' => ['required'],
            'tag' => ['required'],
            'filefoto' => 'mimes:jpeg,jpg,png,gif|max:4000' // max 4000kb
        ],
        [
            'judul.required' => 'Harus diisi',
            'isi.required' => 'Harus diisi',
            'tag.required' => 'Tag harus diisi',
            'filefoto.mimes' => 'Harus diisi jpeg/jpg/png/gif',
            'filefoto.max' => 'Maksimal 4 MB'
        ]);

        $artikel = Artikel::find($id);
        $artikel->artikel_tgl    = $request->tgl;
        $artikel->artikel_judul  = $request->judul;
        $artikel->artikel_isi    = $request->isi;
        $artikel->user_id        = Auth::user()->id;
        $artikel->kategori_id    = $request->kategori;
        $artikel->penulis        = $request->penulis;

        if($request->hasFile('filefoto') == true)
        {
            $file = $request->file('filefoto');
            $filefoto = time()."".$file->getClientOriginalName();
            $file_ext  = $file->getClientOriginalExtension();
            
            $local_gambar = "images/artikel/".$artikel->artikel_gambar;
            if(File::exists($local_gambar))
            {
                File::delete($local_gambar);
            }

            $tujuan_upload = 'images/artikel/';
            $file->move($tujuan_upload,$filefoto);
            $artikel->artikel_gambar = $filefoto;
        }

        $artikel->save();
        $artikel->tag()->sync($request->tag);

        return redirect()->route('artikel.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::find($id);

        $local = "images/artikel/".$artikel->artikel_gambar;
        File::delete($local);

        $artikel->tag()->detach();

        $artikel->delete();
        
        return redirect()->route('artikel.index')->with('success', 'Data Berhasil Dihapus');
    }
}
