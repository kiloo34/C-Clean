<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = [
            ['nama' => 'One Day Service', 'deskripsi' => ''],
            ['nama' => 'Reguler', 'deskripsi' => ''],
            ['nama' => 'Oke', 'deskripsi' => ''],
        ];

        foreach($service as $u){
            DB::table('service')->insert($u);
        }
    }
}
