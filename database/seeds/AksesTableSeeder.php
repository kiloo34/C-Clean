<?php

use Illuminate\Database\Seeder;

class AksesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $akses = [
            ['nama' => 'Order'],
            ['nama' => 'Services'],
            ['nama' => 'Cabang'],
            ['nama' => 'Pengguna'],
            ['nama' => 'Laporan'],
            ['nama' => 'Pengaturan'],
            ['nama' => 'Produk'],
            ['nama' => 'Anggota'],
        ];

        foreach($akses as $u){
            DB::table('akses')->insert($u);
        }
    }
}
