<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Tag;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAbleTo('tag-read')) {

            $tag = Tag::get();
            return view('admin.tag.index', compact('tag'));

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
            'tag' => ['required', 'string', 'max:255', 'unique:tag_tb,tag_nama'],
        ]);

        $tag = new Tag;
        $tag->tag_nama = $request->tag;
        $tag->tag_ket = $request->ket;
        $tag->save();

        return redirect()->route('tag.index')->with('success', 'Data Berhasil Disimpan');
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
        $tag = Tag::find($id);
        if(!empty($tag)) {
            $this->validate($request, [
                'tag' => ['required', 'string', 'max:255', 'unique:tag_tb,tag_nama,' . $id],
            ]);

            $tag->tag_nama = $request->tag;
            $tag->tag_ket = $request->ket;
            $tag->save();

            return redirect()->route('tag.index')->with('success', 'Data Berhasil Diedit');
        }
        
        return redirect()->route('tag.index')->with('warning', 'Data Tidak ditemukan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        if(!empty($tag)) {
            $tag->delete();
            
            return redirect()->route('tag.index')->with('success', 'Data Berhasil Dihapus');
        }
        return $this->_akses();
    }

    private function _akses() {
        return redirect()->route('dashboard')->with('warning', 'Anda Tidak Memiliki Akses');
    }
}
