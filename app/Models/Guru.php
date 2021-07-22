<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru_tb';

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function suratakhir()
    {
    	return $this->belongsTo('App\Models\Master\Surat', 'surat_id');
    }

    public function buku()
    {
    	return $this->hasMany('App\Models\Buku', 'guru_id');
    }

    public function surat()
    {
        return $this->belongsToMany('App\Models\Master\Surat');
    }

    public function juz()
    {
        return $this->belongsToMany('App\Models\Master\Juz');
    }
}
