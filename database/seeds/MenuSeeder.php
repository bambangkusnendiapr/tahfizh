<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
              'menu_nama' => 'Pendaftaran',
            ],
            [
              'menu_nama' => 'Santri',
            ],
            [
              'menu_nama' => 'Buku',
            ],
            [
              'menu_nama' => 'Guru',
            ],
            [
              'menu_nama' => 'Kelas',
            ],
            [
              'menu_nama' => 'Pengguna',
            ],
            [
              'menu_nama' => 'Artikel',
            ],
            [
              'menu_nama' => 'Surat',
            ],
            [
              'menu_nama' => 'Kategori',
            ],
            [
              'menu_nama' => 'Role',
            ],
            [
              'menu_nama' => 'Permission',
            ],
            [
              'menu_nama' => 'Menu',
            ],
        ]);
    }
}
