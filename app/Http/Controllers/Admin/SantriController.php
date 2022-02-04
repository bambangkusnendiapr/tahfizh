<?php

namespace App\Http\Controllers\Admin;

use App\User;
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
use Illuminate\Support\Facades\Hash;
use File;
use App\Exports\SantriExport;
use Maatwebsite\Excel\Facades\Excel;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAbleTo('santri-read')) {
            $santri = Santri::where('santri_konfirmasi', 'sudah')->orderBy('id', 'DESC')->get();
            return view('admin.santri.index', compact('santri'));
        }

        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->isAbleTo('santri-create')) {
            $surat = Surat::get();
            $kelas = Kelas::get();
            return view('admin.santri.create', compact('surat', 'kelas'));
        }

        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->file('filefoto'));

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'no' => ['required'],
            'tgl' => ['required'],
            'filefoto' => 'mimes:jpeg,jpg,png,gif|max:2000' // max 2000kb/2mb
        ],
        [
            'email.email' => 'Isi dengan format email',
            'email.unique' => 'Email ini sudah digunakan',
            'password.min' => 'Minimal password 8 karakter',
            'password.confirmed' => 'Password tidak cocok',
            'tgl.required' => 'Tanggal Harus diisi',
            'no.required' => 'Nomor HP/WA Harus Diisi',
            'filefoto.mimes' => 'harus diisi file gambar',
            'filefoto.max' => 'maksimal 2 MB'
        ]);

        $user = new User;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);

        if($request->hasFile('filefoto') == true){
            $file2 = $request->file('filefoto');
            $namafile2 = time()."".$file2->getClientOriginalName();
    
            $tujuan_upload = 'images/santri/';
            $file2->move($tujuan_upload,$namafile2);
            $user->image = $namafile2;
        }

        $user->save();

        $user->attachRole('santri');

        $user_id = User::orderBy('id','desc')->first();

        $santri = new Santri;
        $santri->santri_panggil     = $request->panggil;
        $santri->santri_nik         = $request->nik;
        $santri->santri_lahir       = $request->lahir;
        $santri->santri_jk          = $request->jk;
        $santri->santri_umur        = $request->umur;
        $santri->santri_tgl         = $request->tgl;
        $santri->santri_hafal       = $request->hafal;
        $santri->santri_no          = $request->no;
        $santri->santri_alamat      = $request->alamat;
        $santri->santri_ket         = $request->ket;
        $santri->surat_id           = $request->surat;
        $santri->user_id            = $user_id->id;
        $santri->kelas_id           = $request->kelas;
        $santri->santri_konfirmasi  = 'sudah';
        $santri->santri_ortu        = $request->ortu;
        $santri->santri_ortu_hubungan = $request->hubungan;
        $santri->santri_ortu_no      = $request->ortu_no;
        $santri->santri_ortu_alamat  = $request->ortu_alamat;
        $santri->save();

        return redirect()->route('santri.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->isAbleTo('santri-buku-read')) {
            $santri = Santri::find($id);
            if(!empty($santri)) {
                if($santri->santri_konfirmasi == 'sudah') {

                    $surat = Surat::get();
                    $juz = Juz::get();
                    $buku = Buku::where('santri_id', $santri->id)->orderBy('id', 'DESC')->get();
                    return view('admin.santri.buku', compact('surat', 'santri', 'juz', 'buku'));
                }

            }

            return redirect()->route('santri.index')->with('warning', 'Data tidak ditemukan');
        }

        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->isAbleTo('santri-update')) {
            $santri = Santri::find($id);
            if($santri) {
                $surat = Surat::get();
                $kelas = Kelas::get();
                return view('admin.santri.edit', compact('surat', 'santri', 'kelas'));
            }
            return redirect()->route('santri.index')->with('warning', 'Data tidak ditemukan');
        }

        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'no' => ['required'],
            'tgl' => ['required'],
            'filefoto' => 'mimes:jpeg,jpg,png,gif|max:2000' // max 2000kb
        ],
        [
            'email.email' => 'Isi dengan format email',
            'tgl.required' => 'Tanggal Harus diisi',
            'no.required' => 'Nomor HP/WA Harus Diisi',
            'filefoto.mimes' => 'harus diisi file gambar jpeg/jpg/png/gif',
            'filefoto.max' => 'maksimal 2 MB'
        ]);

        $santri = Santri::find($id);
        $user = User::find($santri->user_id);

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != null)
        {
            $user->password = Hash::make($request->password);
        }

        if($request->hasFile('filefoto') == true)
        {
            $file = $request->file('filefoto');
            $filefoto = time()."".$file->getClientOriginalName();
            $file_ext  = $file->getClientOriginalExtension();
            
            $local_gambar = "images/santri/".$user->image;
            if(File::exists($local_gambar))
            {
                File::delete($local_gambar);
            }

            $tujuan_upload = 'images/santri/';
            $file->move($tujuan_upload,$filefoto);
            $user->image = $filefoto;
        }

        $user->save();

        $santri->santri_panggil     = $request->panggil;
        $santri->santri_nik         = $request->nik;
        $santri->santri_lahir       = $request->lahir;
        $santri->santri_jk          = $request->jk;
        $santri->santri_umur        = $request->umur;
        $santri->santri_tgl         = $request->tgl;
        $santri->santri_hafal       = $request->hafal;
        $santri->santri_no          = $request->no;
        $santri->santri_alamat      = $request->alamat;
        $santri->santri_ket         = $request->ket;
        $santri->surat_id           = $request->surat;
        $santri->kelas_id           = $request->kelas;
        $santri->santri_ortu        = $request->ortu;
        $santri->santri_ortu_hubungan= $request->hubungan;
        $santri->santri_ortu_no= $request->ortu_no;
        $santri->santri_ortu_alamat= $request->ortu_alamat;
        $santri->save();

        return redirect()->route('santri.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $santri = Santri::find($id);

        $user = User::find($santri->user_id);
        $local = "images/santri/".$user->image;
        File::delete($local);

        $roles = $user->roles;

        foreach ($roles as $role) {
            $user->detachRole($role);
        }

        $user->delete();
        
        return redirect()->route('santri.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function datasantri(Request $request, $id)
    {
        $santri = Santri::find($id);

        $santri->santri_panggil         = $request->panggil;
        $santri->santri_lahir           = $request->lahir;
        $santri->santri_jk              = $request->jk;
        $santri->santri_alamat          = $request->alamat;
        $santri->santri_nik             = $request->nik;
        $santri->santri_tgl             = $request->tgl;
        $santri->santri_no              = $request->no;
        $santri->santri_ket             = $request->ket;
        $santri->santri_ortu            = $request->ortu;
        $santri->santri_ortu_hubungan   = $request->hubungan;
        $santri->santri_ortu_no         = $request->ortu_no;
        $santri->santri_ortu_alamat     = $request->ortu_alamat;

        $santri->save();

        return redirect()->route('profile')->with('success', 'Data Berhasil Dilengkapi');
    }

    public function santri_buku_create($id)
    {
        if(Auth::user()->isAbleTo('santri-buku-create')) {
            $santri = Santri::find($id);
            $nilai = Nilai::get();
            return view('admin.santri.buku_create', compact('santri', 'nilai'));
        }

        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
    }

    public function santri_buku_tambah(Request $request, $id)
    {
        $this->validate($request, [
            'tgl'       => ['required', 'date'],
            'jilid'     => ['required'],
            'halaman'   => ['required'],
            'murajaah'  => ['required'],
            'ziyadah'   => ['required']
        ],
        [
            'tgl.required'      => 'Harus diisi',
            'jilid.required'    => 'Harus diisi',
            'halaman.required'  => 'Harus diisi',
            'murajaah.required' => 'Harus diisi',
            'ziyadah.required'  => 'Harus diisi'
        ]);

        $santri = Santri::find($id);
        $guru = Guru::where('user_id', Auth::user()->id)->first();

        $buku = new Buku;
        $buku->buku_tgl         = $request->tgl;
        $buku->santri_id        = $santri->id;
        $buku->guru_id          = $guru->id;
        $buku->buku_jilid       = $request->jilid;
        $buku->buku_halaman     = $request->halaman;
        $buku->buku_murajaah    = $request->murajaah;
        $buku->buku_ziyadah     = $request->ziyadah;
        $buku->nilai_id         = $request->nilai;
        $buku->buku_ket         = $request->ket;

        $buku->save();

        return redirect()->route('santri.show', $santri->id)->with('success', 'Data Berhasil Ditambahkan');
    }

    public function santri_buku_edit($id)
    {
        //cek permission
        if(Auth::user()->isAbleTo('santri-buku-update')){
            //ambil data buku
            $buku = Buku::find($id); 
            //ambil data guru
            $guru = Guru::where('user_id', Auth::user()->id)->first();
            //cek data buku = data guru yang menambahkan
            if($buku->guru_id == $guru->id) {
                // $santri = Santri::find($buku->santri_id);
                $nilai = Nilai::get();
                return view('admin.santri.buku_edit', compact('nilai', 'buku'));
            }

            return redirect()->route('santri.show', $buku->santri_id)->with('warning', 'Maaf! Edit data sesuai yang anda tambahkan');
        }

        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
    }

    public function santri_buku_update(Request $request, $id)
    {
        $this->validate($request, [
            'tgl'       => ['required', 'date'],
            'jilid'     => ['required'],
            'halaman'   => ['required'],
            'murajaah'  => ['required'],
            'ziyadah'   => ['required']
        ],
        [
            'tgl.required'      => 'Harus diisi',
            'jilid.required'    => 'Harus diisi',
            'halaman.required'  => 'Harus diisi',
            'murajaah.required' => 'Harus diisi',
            'ziyadah.required'  => 'Harus diisi'
        ]);

        $buku = Buku::find($id);
        $buku->buku_tgl         = $request->tgl;
        $buku->buku_jilid       = $request->jilid;
        $buku->buku_halaman     = $request->halaman;
        $buku->buku_murajaah    = $request->murajaah;
        $buku->buku_ziyadah     = $request->ziyadah;
        $buku->nilai_id         = $request->nilai;
        $buku->buku_ket         = $request->ket;

        $buku->save();

        return redirect()->route('santri.show', $buku->santri_id)->with('success', 'Data Berhasil Diedit');
    }

    public function santri_buku_delete($id)
    {
        $buku = Buku::find($id);
        
        $guru = Guru::where('user_id', Auth::user()->id)->first();

        if($buku->guru_id == $guru->id) {

            $buku->delete();
        
            return redirect()->route('santri.show', $buku->santri_id)->with('success', 'Data Berhasil Dihapus');
        }

        return redirect()->route('santri.show', $buku->santri_id)->with('warning', 'Maaf! Hapus data sesuai yang anda tambahkan');
        
    }

    public function santri_surat_juz(Request $request, $id)
    {
        $santri = Santri::find($id);
        $santri->surat_id = $request->surat_akhir;
        $santri->save();
        $santri->juz()->sync($request->juz);
        $santri->surat()->sync($request->surat);

        return redirect()->route('santri.show', $santri->id)->with('success', 'Hafalan Berhasil Ditambahkan');
    }

    public function export() 
    {
        return Excel::download(new SantriExport, 'santri.xlsx');
    }
}
