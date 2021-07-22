<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAbleTo('role-read')) {
            $roles = Role::get();
            return view('admin.role.index', compact('roles'));
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
        if(Auth::user()->isAbleTo('role-create')) {

            $permissions = Permission::get();
            $menus = Menu::get();
            return view('admin.role.create', compact('permissions', 'menus'));

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
            'name' => ['required', 'string', 'max:255', 'unique:roles'],
            'display_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        $role = Role::create([
            'name' => $request->input('name'),
            'display_name' => $request->input('display_name'),
            'description' => $request->input('description'),
        ]);

        $role->attachPermissions($request->input('permissions_id'));

        return redirect()->route('role.index')->with('success', 'Data Berhasil Disimpan');
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
        if(Auth::user()->isAbleTo('role-update')) {
            $role = Role::find($id);
            if(!empty($role)) {
                $menus = Menu::all();
                $permissions = Permission::all();
                $rolePermissions = $role->permissions()->get()->pluck('id')->toArray();

                return view('admin.role.edit', compact('role', 'permissions', 'rolePermissions', 'menus'));
            }
            return redirect()->route('role.index')->with('warning', 'Data Tidak Ditemukan');
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
            $role = Role::find($id);
            if(!empty($role)) {
                $this->validate($request, [
                    'name' => ['required', 'string', 'max:255', 'unique:roles,name,' . $id],
                    'display_name' => ['required', 'string', 'max:255'],
                    'description' => ['required', 'string', 'max:255'],
                ]);
    
                $role->update([
                    'name' => $request->input('name'),
                    'display_name' => $request->input('display_name'),
                    'description' => $request->input('description'),
                ]);
    
                $role->syncPermissions($request->input('permissions_id'));
    
                return redirect()->route('role.index')->with('success', 'Data Berhasil Diedit');
            }
            return redirect()->route('role.index')->with('warning', 'Data Tidak Ditemukan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $role = Role::find($id);
            if(!empty($role)) {
                $role->detachPermissions($role->permissions()->get()->pluck('id')->toArray());
                $role->forceDelete();

                return redirect()->route('role.index')->with('success', 'Data Berhasil Dihapus');
            }
            return redirect()->route('role.index')->with('warning', 'Data Tidak Ditemukan');
    }

    private function _akses() {
        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
    }
}
