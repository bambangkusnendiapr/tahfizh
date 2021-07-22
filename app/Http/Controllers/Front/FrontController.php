<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Profil;
use App\Models\Master\Tag;
use App\Models\Kategori;
use App\Models\Artikel;
use App\Models\Komentar;
use App\User;

class FrontController extends Controller
{
    public function index()
    {
        $profil = Profil::find(1);
        return view('front.index', compact('profil'));
    }

    public function artikel()
    {
        $artikel        = Artikel::orderBy('id', 'desc')->paginate(10);
        $user           = User::get();
        $tag            = Tag::get();
        $kategori       = Kategori::get();
        $artikel_akhir  = Artikel::orderBy('id', 'desc')->take(1)->get();
        return view('front.artikel', compact('tag', 'kategori', 'artikel', 'user', 'artikel_akhir'));
    }

    public function artikel_single($slug)
    {
        $komentar_akhir = Komentar::orderBy('id', 'desc')->first();
        $artikel        = Artikel::where('artikel_slug', $slug)->orderBy('id', 'desc')->first();
        $user           = User::get();
        $tag            = Tag::get();
        $kategori       = Kategori::get();
        $artikel_akhir  = Artikel::orderBy('id', 'desc')->take(1)->get();
        return view('front.artikel-single', compact('tag', 'kategori', 'artikel', 'user', 'artikel_akhir', 'komentar_akhir'));
    }

    public function artikel_kategori($id)
    {
        $artikel        = Artikel::where('kategori_id', $id)->orderBy('id', 'desc')->paginate(10);
        $user           = User::get();
        $tag            = Tag::get();
        $kategori       = Kategori::get();
        $artikel_akhir  = Artikel::orderBy('id', 'desc')->take(1)->get();
        $title          = Kategori::find($id)->kategori_nama;
        return view('front.artikel', compact('tag', 'kategori', 'artikel', 'user', 'artikel_akhir', 'title'));
    }

    public function artikel_tag($id)
    {
        // $tag = Tag::find($id);

        // $artikelAll     = Artikel::get();
        // $artikel        = $artikelAll->tag()->where('tag_id', $id)->paginate(10);
        $artikel = Tag::find($id)->artikel()->orderBy('id', 'desc')->paginate(10);
        $user           = User::get();
        $tag            = Tag::get();
        $kategori       = Kategori::get();
        $artikel_akhir  = Artikel::orderBy('id', 'desc')->take(1)->get();
        $title          = Tag::find($id)->tag_nama;
        return view('front.artikel', compact('tag', 'kategori', 'artikel', 'user', 'artikel_akhir', 'title'));
    }
}
