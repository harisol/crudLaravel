<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{

	/**
	* Belajar relasi has many through untuk kasus tabel berikut:
	*
	* kotas
	*     id - integer
	*     nama_kota - string
	* 
	* users
	*     id - integer
	*     kota_id - integer
	*     name - string
	* 
	* kendaraans
	*     id - integer
	*     user_id - integer
	*     nama_kendaraan - string
	*
	* dari plan tabel di atas, tabel kendaraans tidak ada hubungan relasi dengan tabel kotas (baca:kota)
	* tapi kita dapat mendapatkan semua data kendaraan yang ada di kota A misalnya,
	* dengan memanfaatkan tabel users yang berelasi dengan tabel kendaraans.
	*
	*/

    protected $table = 'kota';
    protected $fillable = ['nama_kota'];

    /**
    * Untuk mendapatkan semua kendaraan melalui model Kota.
    * Jika table kalian mengikuti konvensi dari Laravel
    * Maka pakai yang di bawah ini
    * Konvensi tsb yaitu nama Foreign key nya user_id, post_id, dll
    * dan Primary key nya id
    */
    public function kendaraans()
    {
        return $this->hasManyThrough(Kendaraan::class, User::class);
    }

    /**
    * Jika tidak mengikuti konvensi Laravel
    */
    public function kendaraans2()
    {
        return $this->hasManyThrough(
            'App\Kendaraan', 'App\User',
            'kota_kode', 	// foreign key di table users misalnya
            'user_kode', 	// foreign key di table kendaraans misalnya
            'user_kode' 	// primary key di table users misalnya
        );
    }
}
