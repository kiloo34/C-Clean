<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@mail.com',
            'password' => bcrypt('123456'),
            'token' => str_random(10),
            'status' => false,
            'id_role' => 1,
        ]);
    }
}
