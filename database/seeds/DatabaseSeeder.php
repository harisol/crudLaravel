<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(KotaTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(KendaraanTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RolesUsersSeeder::class);

        /*blablablabla*/
        /*blablablabla*/
        /*blablablabla*/
        
        $this->call('CommentTableSeeder');
        // $this->call(CommentTableSeeder::class); kalau yg atas tidak bisa, pakai yg ini
        $this->command->info('Comment table seeded.');
    }
}
