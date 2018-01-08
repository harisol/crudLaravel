<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $table = 'profile';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'nama', 'jenis_kelamin', 'alamat', 'no_telp', 'user_id',
    ];

	/**
	* Sembunyikan data yang tidak boleh diakses umum.
	*
	* @var array
	*/
	protected $hidden = [
		'alamat', 'no_telp',
	];

	/**
	* Mendapatkan data User yang berelasi dengan Profile
	*/
	public function user()
	{
		return $this->belongsTo('App\User');
	}
     
 }
