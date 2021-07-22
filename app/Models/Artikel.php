<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel_tb';

    public function tag()
    {
        return $this->belongsToMany('App\Models\Master\Tag');
    }

    public function penulis()
    {
    	return $this->belongsTo('App\User', 'penulis');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function kategori()
    {
    	return $this->belongsTo('App\Models\Kategori');
    }

    public function komentar()
    {
    	return $this->hasMany('App\Models\Komentar');
    }
    
}
