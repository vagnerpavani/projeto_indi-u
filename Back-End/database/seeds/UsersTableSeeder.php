<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> 'ADM',
            'username' => 'ADM',
            'password' => bcrypt('secret'),
            'email' => 'adm@adm.com',
            'language' => 'pt br',
            'is_admin' => true,
        ]);
    }
}
