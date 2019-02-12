<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            ['nama' => 'admin'],
            ['nama' => 'kasir'],
        ];

        foreach($role as $u){
            DB::table('role')->insert($u);
        }
    }
}
