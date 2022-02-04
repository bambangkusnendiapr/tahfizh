<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use App\Models\Master\Surat;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use File;
use App\Exports\GuruExport;
use Maatwebsite\Excel\Facades\Excel;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAbleTo('guru-read')) {
            $guru = Guru::get();
            return view('admin.guru.index', compact('guru'));
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
        if(Auth::user()->isAbleTo('guru-create')) {
            $surat = Surat::get();
            return view('admin.guru.create', compact('surat'));
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
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'no' => ['required'],
            'tgl' => ['required'],
            'filefoto' => 'mimes:jpeg,jpg,png,gif|max:2000' // max 2000kb
        ],
        [
            'email.email' => 'Isi dengan format email',
            'email.unique' => 'Email ini sudah digunakan',
            'password.min' => 'Minimal password 8 karakter',
            'password.confirmed' => 'Password tidak cocok',
            'tgl.required' => 'Tanggal Harus diisi',
            'no.required' => 'Nomor HP/WA Harus Diisi',
            'filefoto.mimes' => 'harus diisi file gambar jpeg/jpg/png/gif',
            'filefoto.max' => 'maksimal 2 MB'
        ]);

        $user = new User;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);

        if($request->hasFile('filefoto') == true){
    
            $file2 = $request->file('filefoto');
            $namafile2 = time()."".$file2->getClientOriginalName();
    
            $tujuan_upload = 'images/guru';
            $file2->move($tujuan_upload,$namafile2);
            $user->image = $namafile2;

        }

        $user->save();

        $user->attachRole('guru');

        $user_id = User::orderBy('id','desc')->first();

        $guru = new Guru;
        $guru->guru_jk      = $request->jk;
        $guru->guru_lahir   = $request->lahir;
        $guru->guru_tgl     = $request->tgl;
        $guru->guru_no      = $request->no;
        $guru->guru_alamat  = $request->alamat;
        $guru->guru_ket     = $request->ket;
        $guru->surat_id     = $request->surat;
        $guru->user_id      = $user_id->id;
        $guru->save();

        return redirect()->route('guru.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        if(Auth::user()->isAbleTo('guru-update')) {
            $guru = Guru::find($id);
            if(!empty($guru)) {
                $surat = Surat::get();
                return view('admin.guru.edit', compact('surat', 'guru'));
            }
            return redirect()->route('guru.index')->with('warning', 'Data tidak ditemukan');
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

        $guru = Guru::find($id);
        $user = User::find($guru->user_id);

        $user->name = $request->name;
        $user->email = $request->email;

        if($request->hasFile('filefoto') == true)
        {
            $file = $request->file('filefoto');
            $filefoto = time()."".$file->getClientOriginalName();
            $file_ext  = $file->getClientOriginalExtension();
            
            $local_gambar = "images/guru/".$user->image;
            if(File::exists($local_gambar))
            {
                File::delete($local_gambar);
            }

            $tujuan_upload = 'images/guru/';
            $file->move($tujuan_upload,$filefoto);
            $user->image = $filefoto;
        }

        $user->save();

        $guru->guru_jk      = $request->jk;
        $guru->guru_lahir   = $request->lahir;
        $guru->guru_tgl     = $request->tgl;
        $guru->guru_no      = $request->no;
        $guru->guru_alamat  = $request->alamat;
        $guru->guru_ket     = $request->ket;
        $guru->surat_id     = $request->surat;

        $guru->save();

        return redirect()->route('guru.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::find($id);

        $user = User::find($guru->user_id);
        $local = "images/guru/".$user->image;
        File::delete($local);

        $roles = $user->roles;

        foreach ($roles as $role) {
            $user->detachRole($role);
        }

        $user->delete();
        
        return redirect()->route('guru.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function dataguru(Request $request, $id)
    {
        $guru = Guru::find($id);
        $guru->guru_jk      = $request->jk;
        $guru->guru_lahir   = $request->lahir;
        $guru->guru_tgl     = $request->tgl;
        $guru->guru_no      = $request->no;
        $guru->guru_alamat  = $request->alamat;
        $guru->guru_ket     = $request->ket;
        $guru->surat_id     = $request->surat;

        $guru->save();

        return redirect()->route('profile')->with('success', 'Data Berhasil Diedit');
    }

    public function export() 
    {

        if(Auth::user()->hasRole('superadmin|admin')) {
            return Excel::download(new GuruExport, 'guru.xlsx');
        }

        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
    }
}
