<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas_tb';

    public function santri()
    {
    	return $this->hasMany('App\Models\Santri');
    }
}
