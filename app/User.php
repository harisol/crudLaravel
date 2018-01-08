<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Untuk mendapatkan data Profile yang berelasi dengan User.
     */
    public function profile()
    {
        return $this->hasOne('App\Profile','user_id');
    }

    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class); //  bisa juga hasMany('App\Kendaraan')
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, $table='roles_users');
    }

    public function kota()
    {
        return $this->belongsTo('App\Kota');
    }
}
