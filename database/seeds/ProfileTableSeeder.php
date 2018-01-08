<?php

use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Profile::insert([
           [
                'nama' => 'Billy',
                'jenis_kelamin' => 'laki-laki',
                'alamat' => 'magetan',
                'no_telp' => '085728778877',
                'user_id' => '1'
           ],
           [
                'nama' => 'Kate',
                'jenis_kelamin' => 'perempuan',
                'alamat' => 'solo',
                'no_telp' => '085728778899',
                'user_id' => '2'
           ]
        ]);
    }
}
