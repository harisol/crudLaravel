<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\App\User::insert([
    		[
    			'name' => 'billy',
    			'email' => 'billy@gmail.com',
    			'password' => \Hash::make('billy'),
                'kota_id' => 1
    		],
    		[
    			'name' => 'kate',
    			'email' => 'kate@gmail.com',
    			'password' => \Hash::make('kate'),
                'kota_id' => 2
    		]
    	]);
    }
}
