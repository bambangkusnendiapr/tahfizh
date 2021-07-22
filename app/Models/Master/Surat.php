<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat_tb';

    public function gurusurat()
    {
        return $this->hasOne('App\Models\Guru');
    }

    public function santri()
    {
        return $this->belongsToMany('App\Models\Santri');
    }

    public function guru()
    {
        return $this->belongsToMany('App\Models\Guru');
    }
}
