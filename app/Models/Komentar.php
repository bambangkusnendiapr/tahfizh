<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar_tb';

    public function artikel()
    {
    	return $this->belongsTo('App\Models\Artikel');
    }
}
