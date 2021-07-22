<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Juz extends Model
{
    protected $table = 'juz_tb';

    public function santri()
    {
        return $this->belongsToMany('App\Models\Santri');
    }

    public function guru()
    {
        return $this->belongsToMany('App\Models\Guru');
    }
}
