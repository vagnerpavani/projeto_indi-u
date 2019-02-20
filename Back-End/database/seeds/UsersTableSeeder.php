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
        //insere um Usuário administrador no BD.
        DB::table('users')->insert([
            'name'=> 'ADM',
            'username' => 'ADM',
            'password' => bcrypt('secret'),
            'email' => 'adm@adm.com',
            'is_admin' => true,
        ]);
    }
}
