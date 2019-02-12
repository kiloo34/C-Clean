<?php

use Illuminate\Database\Seeder;
use App\Akses;

class DetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $detail = [
            ['nama' => 'Lihat Order', 'id_akses' => 1],
            ['nama' => 'Hapus Order', 'id_akses' => 1],
            ['nama' => 'Tambah Order', 'id_akses' => 1],
            ['nama' => 'Ubah Order', 'id_akses' => 1],
            ['nama' => 'Menu Services', 'id_akses' => 2 ],
            ['nama' => 'Lihat Services', 'id_akses' => 2 ],
            ['nama' => 'Hapus Services', 'id_akses' => 2 ],
            ['nama' => 'Tambah Services', 'id_akses' => 2 ],
            ['nama' => 'Ubah Services', 'id_akses' => 2 ],
            ['nama' => 'Lihat Cabang', 'id_akses' => 3],
            ['nama' => 'Hapus Cabang', 'id_akses' => 3],
            ['nama' => 'Tambah Cabang', 'id_akses' => 3],
            ['nama' => 'Ubah Cabang', 'id_akses' => 3],
            ['nama' => 'Menu Pengguna', 'id_akses' => 4],
            ['nama' => 'Lihat Pengguna', 'id_akses' => 4],
            ['nama' => 'Hapus Pengguna', 'id_akses' => 4],
            ['nama' => 'Tambah Pengguna', 'id_akses' => 4],
            ['nama' => 'Ubah Pengguna', 'id_akses' => 4],
            ['nama' => 'Menu Laporan', 'id_akses' => 5],
            ['nama' => 'Lihat Laporan', 'id_akses' => 5],
            ['nama' => 'Hapus Laporan', 'id_akses' => 5],
            ['nama' => 'Tambah Laporan', 'id_akses' => 5],
            ['nama' => 'Ubah Laporan', 'id_akses' => 5],
            ['nama' => 'Menu Pengaturan', 'id_akses' => 6],
            ['nama' => 'Lihat Produk', 'id_akses' => 7],
            ['nama' => 'Hapus Produk', 'id_akses' => 7],
            ['nama' => 'Tambah Produk', 'id_akses' => 7],
            ['nama' => 'Ubah Produk', 'id_akses' => 7],
            ['nama' => 'Lihat Anggota', 'id_akses' => 8],
            ['nama' => 'Hapus Anggota', 'id_akses' => 8],
            ['nama' => 'Tambah Anggota', 'id_akses' => 8],
            ['nama' => 'Ubah Anggota', 'id_akses' => 8],
        ];

        foreach($detail as $u){
            DB::table('detail_akses')->insert($u);
        }
    }
}
