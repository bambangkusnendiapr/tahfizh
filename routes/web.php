<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'Front\FrontController@index')->name('front.index');
Route::get('/artikel', 'Front\FrontController@artikel')->name('front.artikel');
Route::get('/artikel/{slug}', 'Front\FrontController@artikel_single')->name('front.artikel.single');
Route::get('/artikel/kategori/{id}', 'Front\FrontController@artikel_kategori')->name('artikel.kategori');
Route::get('/artikel/tag/{id}', 'Front\FrontController@artikel_tag')->name('artikel.tag');

//Komentar
Route::resource('komentar', 'Admin\KomentarController');

Route::post('/daftar', 'Admin\UserController@daftar')->name('daftar');

Auth::routes();

// Route::get('home', 'HomeController@index')->name('home');
Route::get('/home', function() {
    return redirect()->route('dashboard');
});

Route::get('/password/email', function() {
    return redirect()->route('dashboard');
});

Route::get('/password/reset', function() {
    return redirect()->route('dashboard');
});

Route::namespace('Admin') //Folder Penyimpan Controller
    ->prefix('admin') //Penambahan url di awal
    ->middleware('auth') //harus login
    ->group(function () {

    //Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    
    //Profile
    Route::get('profile', 'UserController@profile')->name('profile');
    Route::patch('profile/update/{id}', 'UserController@profileUpdate')->name('profile.update');
    Route::patch('profile/password/{id}', 'UserController@profilePassword')->name('profile.password');
    
    //Pendaftaran
    Route::get('pendaftaran', 'PendaftaranController@index')->name('pendaftaran');
    Route::put('pendafatran/{id}', 'PendaftaranController@konfirmasi')->name('konfirmasi');

    //Santri
    Route::resource('santri', 'SantriController');
    //edit santri di profile
    Route::PATCH('datasantri/{id}', 'SantriController@datasantri')->name('data.santri');
    //form tambah data buku
    Route::get('santri/buku/create/{id}', 'SantriController@santri_buku_create')->name('santri.buku.create');
    //tambah data buku
    Route::PATCH('santri/buku/tambah/{id}', 'SantriController@santri_buku_tambah')->name('santri.buku.tambah');
    //form edit buku
    Route::get('santri/buku/edit/{id}', 'SantriController@santri_buku_edit')->name('santri.buku.edit');
    //update data buku
    Route::PATCH('santri/buku/{id}', 'SantriController@santri_buku_update')->name('santri.buku.update');
    //hapus data buku
    Route::delete('santri/buku/{id}', 'SantriController@santri_buku_delete')->name('santri.buku.delete');
    //hafalan juz dan surat
    Route::PATCH('santritahfizh/{id}', 'SantriController@santri_surat_juz')->name('santri.surat.juz');
    //download excel
    Route::get('santriexport', 'SantriController@export')->name('santri.export');
    
    //Guru
    Route::resource('guru', 'GuruController');
    Route::PATCH('dataguru/{id}', 'GuruController@dataguru')->name('data.guru');
    Route::get('guruexport', 'GuruController@export')->name('guru.export');

    //kelas
    Route::resource('kelas', 'Master\KelasController');
    
    //artikel
    Route::resource('artikel', 'ArtikelController');

    //kategori
    Route::resource('kategori', 'KategoriController');

    //nilai
    Route::resource('nilai', 'Master\NilaiController');
    
    //profil kantor
    Route::resource('profil', 'Master\ProfilController');

    
    //tag
    Route::resource('tag', 'Master\TagController');

    
    //Pengaturan
    //User / Pengguna
    Route::resource('user', 'UserController');
    Route::resource('menu', 'MenuController');    
    Route::resource('permission', 'PermissionController');    
    Route::resource('role', 'RoleController');
    
});