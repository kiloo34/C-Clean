<?php

use Illuminate\Database\Seeder;

class RoleAksesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ra = [
            ['status' => true, 'id_role' => '1', 'id_detail' => 1],
            ['status' => true, 'id_role' => '1', 'id_detail' => 2],
            ['status' => true, 'id_role' => '1', 'id_detail' => 3],
            ['status' => true, 'id_role' => '1', 'id_detail' => 4],
            ['status' => true, 'id_role' => '1', 'id_detail' => 5],
            ['status' => true, 'id_role' => '1', 'id_detail' => 6],
            ['status' => true, 'id_role' => '1', 'id_detail' => 7],
            ['status' => true, 'id_role' => '1', 'id_detail' => 8],
            ['status' => true, 'id_role' => '1', 'id_detail' => 9],
            ['status' => true, 'id_role' => '1', 'id_detail' => 10],
            ['status' => true, 'id_role' => '1', 'id_detail' => 11],
            ['status' => true, 'id_role' => '1', 'id_detail' => 12],
            ['status' => true, 'id_role' => '1', 'id_detail' => 13],
            ['status' => true, 'id_role' => '1', 'id_detail' => 14],
            ['status' => true, 'id_role' => '1', 'id_detail' => 15],
            ['status' => true, 'id_role' => '1', 'id_detail' => 16],
            ['status' => true, 'id_role' => '1', 'id_detail' => 17],
            ['status' => true, 'id_role' => '1', 'id_detail' => 18],
            ['status' => true, 'id_role' => '1', 'id_detail' => 19],
            ['status' => true, 'id_role' => '1', 'id_detail' => 20],
            ['status' => true, 'id_role' => '1', 'id_detail' => 21],
            ['status' => true, 'id_role' => '1', 'id_detail' => 22],
            ['status' => true, 'id_role' => '1', 'id_detail' => 23],
            ['status' => true, 'id_role' => '1', 'id_detail' => 24],
            ['status' => true, 'id_role' => '1', 'id_detail' => 25],
            ['status' => true, 'id_role' => '1', 'id_detail' => 26],
            ['status' => true, 'id_role' => '1', 'id_detail' => 27],
            ['status' => true, 'id_role' => '1', 'id_detail' => 28],
            ['status' => true, 'id_role' => '1', 'id_detail' => 29],
            ['status' => true, 'id_role' => '1', 'id_detail' => 30],
            ['status' => true, 'id_role' => '1', 'id_detail' => 31],
            ['status' => true, 'id_role' => '1', 'id_detail' => 32],
        ];

        foreach($ra as $u){
            DB::table('role_akses')->insert($u);
        }
    }
}
