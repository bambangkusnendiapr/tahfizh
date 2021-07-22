<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku_tb';

    public function santri()
    {
        return $this->belongsTo('App\Models\Santri');
    }

    // public function user()
    // {
    //     return $this->santri->belongsTo('App\User');
    // }

    public function guru()
    {
        return $this->belongsTo('App\Models\Guru');
    }

    // public function user()
    // {
    //     return $this->guru->belongsTo('App\User');
    // }

    public function nilai()
    {
        return $this->belongsTo('App\Models\Master\Nilai');
    }

    // public function userGuru()
    // {
    //     return $this->hasOneThrough('App\Models\Guru', 'App\User');
    // }
}
