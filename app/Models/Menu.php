<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['menu_nama'];

    public function permissions()
    {
    	return $this->belongsToMany('App\Models\Permission');
    }
}
