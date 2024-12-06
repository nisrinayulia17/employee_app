<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('karyawan')->insert([
            'nama' => 'Budi',
            'gender' => 'Pria',
            'telp' => '08123456789',
            'email' => 'budi12@gmail.com',
            'alamat' => 'Jl. Raya No. 1',
            'divisi' => 'HRD',
            'tgl_mulai' => '2022-01-01',
            'status_aktif' => '1', //aktif
            'tgl_akhir' => null,
            'foto' => 'foto_karyawan/JrsIwVpQcHJr2yOGrown4jCTauJwxeqQcB6OgHGp.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
