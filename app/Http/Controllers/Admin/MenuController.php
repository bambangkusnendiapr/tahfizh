<?php

namespace App\Http\Controllers\Admin;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAbleTo('menu-read')) {
            $menus = Menu::get();
            return view('admin.menu.index', compact('menus'));
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
            'menu' => ['required', 'string', 'max:255', 'unique:menus,menu_nama'],
        ]);

        Menu::create([
            'menu_nama' => $request->input('menu'),
        ]);

        return redirect()->route('menu.index')->with('success', 'Data Berhasil Disimpan');
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
        $menu = Menu::find($id);
        if(!empty($menu)) {
            $this->validate($request, [
                'menu' => ['required', 'string', 'max:255', 'unique:menus,menu_nama,' . $id],
            ]);

            $menu->update([
                'menu_nama' => $request->input('menu'),
            ]);

            return redirect()->route('menu.index')->with('success', 'Data Berhasil Diedit');
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
        $menu = Menu::find($id);
        if(!empty($menu)) {
            $menu->delete();
            
            return redirect()->route('menu.index')->with('success', 'Data Berhasil Dihapus');
        }
        return $this->_akses();
    }

    private function _akses() {
        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
    }
}
