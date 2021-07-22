<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag_tb';

    public function artikel()
    {
        return $this->belongsToMany('App\Models\Artikel');
    }
}
