<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
	protected $table = 'kendaraan';

	protected $fillable = [
    	'nama_kendaraan', 'jenis_kendaraan', 'buatan', 'user_id', 'created_at', 'updated_at'
    ];

    /**
     * Untuk mendapatkan data users yang berelasi dengan kendaraan.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function kota($id)
    {
        return \App\Kota::find($id);
    }

}
