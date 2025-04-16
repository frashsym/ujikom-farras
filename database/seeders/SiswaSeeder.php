<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswa')->insert([
            [
                "nisn" => 1000,
                "nis" => 1000,
                "nama" => "Rifqi",
                "id_kelas" => 1,
                "alamat" => "Cirebon",
                "no_telp" => "08123456",
                "id_spp" => 1,
            ],
            [
                "nisn" => 1001,
                "nis" => 1001,
                "nama" => "Farras",
                "id_kelas" => 2,
                "alamat" => "Cirebon",
                "no_telp" => "08123455",
                "id_spp" => 2,
            ],
            [
                "nisn" => 1003,
                "nis" => 1003,
                "nama" => "Hasyim",
                "id_kelas" => 3,
                "alamat" => "Cirebon",
                "no_telp" => "08123444",
                "id_spp" => 3,
            ],
            [
                "nisn" => 1004,
                "nis" => 1004,
                "nama" => "Mifta",
                "id_kelas" => 4,
                "alamat" => "Cirebon",
                "no_telp" => "08123432",
                "id_spp" => 4,
            ],
            [
                "nisn" => 1005,
                "nis" => 1005,
                "nama" => "Yannan",
                "id_kelas" => 5,
                "alamat" => "Cirebon",
                "no_telp" => "08888833",
                "id_spp" => 3,
            ],
        ]);
    }
}
