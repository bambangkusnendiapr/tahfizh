<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAbleTo('menu-read')) {

            $permissions = Permission::get();
            $menus = Menu::get();
            return view('admin.permission.index', compact('permissions', 'menus'));

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
            'name' => ['required', 'string', 'max:255', 'unique:permissions'],
            'display_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'menu_id' => ['required']
        ]);

        $permission = Permission::create([
            'name' => $request->input('name'),
            'display_name' => $request->input('display_name'),
            'description' => $request->input('description'),
        ]);

        $permission->menus()->attach($request->menu_id);

        return redirect()->route('permission.index')->with('success', 'Data Berhasil Disimpan');
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
            $permission = Permission::find($id);

            if(!empty($permission)) {
                $this->validate($request, [
                    'name' => ['required', 'string', 'max:255', 'unique:permissions,name,' . $id],
                    'display_name' => ['required', 'string', 'max:255'],
                    'description' => ['required', 'string', 'max:255'],
                ]);
    
                $permission->update([
                    'name' => $request->input('name'),
                    'display_name' => $request->input('display_name'),
                    'description' => $request->input('description'),
                ]);
    
                $permission->menus()->sync($request->menu_id);
    
                return redirect()->route('permission.index')->with('success', 'Data Berhasil Diedit');
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
            $permission = Permission::find($id);
            if(!empty($permission)) {
                $permission->delete();

                return redirect()->route('permission.index')->with('success', 'Data Berhasil Dihapus');
            }
            return $this->_akses();
    }

    private function _akses() {
        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
    }
}
