<?php

use Illuminate\Database\Seeder;

class ProdukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produk = [
            ['nama' => 'Baju', 'durasi' => '1', 'harga' => '8.000', 'id_service' => '1'],
            ['nama' => 'Celana', 'durasi' => '1', 'harga' => '8.000', 'id_service' => '1'],
            ['nama' => 'Jeans', 'durasi' => '1', 'harga' => '7.500', 'id_service' => '1'],
            ['nama' => 'Jaket', 'durasi' => '1', 'harga' => '10.000', 'id_service' => '1'],
            ['nama' => 'Baju', 'durasi' => '3', 'harga' => '4.500', 'id_service' => '2'],
            ['nama' => 'Celana', 'durasi' => '3', 'harga' => '4.500', 'id_service' => '2'],
            ['nama' => 'Jeans', 'durasi' => '3', 'harga' => '5.000', 'id_service' => '2'],
            ['nama' => 'Jaket', 'durasi' => '3', 'harga' => '4.500', 'id_service' => '2'],
        ];

        foreach($produk as $u){
            DB::table('product')->insert($u);
        }
    }
}
