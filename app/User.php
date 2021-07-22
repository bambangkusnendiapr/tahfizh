<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image','aktif',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function santri()
    {
        return $this->hasOne('App\Models\Santri');
    }
    
    public function buku()
    {
        return $this->hasManyThrough('App\Models\Buku', 'App\Models\Santri');
    }

    public function guru()
    {
        return $this->hasOne('App\Models\Guru');
    }

    public function artikel()
    {
        return $this->hasMany('App\Models\Artikel');
    }
    
    // public function buku()
    // {
    //     return $this->hasManyThrough('App\Models\Buku', 'App\Models\Guru');
    // }

}
