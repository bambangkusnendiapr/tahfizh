<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai_tb';

    public function buku()
    {
    	return $this->hasMany('App\Models\Buku', 'nilai_id');
    }
}
