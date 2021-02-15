<?php

use Illuminate\Database\Seeder;

class jenisBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_barang')->insert([
            'jenis_barang' => 'Logistik',
        ]);

        DB::table('jenis_barang')->insert([
            'jenis_barang' => 'Peralatan',
        ]);
    }
}
