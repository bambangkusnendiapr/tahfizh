<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $table = 'santri_tb';

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function kelas()
    {
    	return $this->belongsTo('App\Models\Master\Kelas');
    }

    public function suratakhir()
    {
        return $this->belongsTo('App\Models\Master\Surat', 'surat_id');
    }

    public function buku()
    {
    	return $this->hasMany('App\Models\Buku', 'santri_id');
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
