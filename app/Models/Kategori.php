<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori_tb';

    protected $fillable = ['kategori_nama', 'kategori_ket'];

    public function artikel()
    {
    	return $this->hasMany('App\Models\Artikel');
    }
}
