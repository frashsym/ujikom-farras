<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelas')->insert([
            [
                "nama_kelas" => "X",
                "kompetensi_keahlian" => "Rpl",
            ],
            [
                "nama_kelas" => "X",
                "kompetensi_keahlian" => "Tkj",
            ],
            [
                "nama_kelas" => "X",
                "kompetensi_keahlian" => "Toi",
            ],
            [
                "nama_kelas" => "X",
                "kompetensi_keahlian" => "Mm",
            ],
            [
                "nama_kelas" => "XI",
                "kompetensi_keahlian" => "Rpl",
            ],
            [
                "nama_kelas" => "XI",
                "kompetensi_keahlian" => "Tkj",
            ],
            [
                "nama_kelas" => "XI",
                "kompetensi_keahlian" => "Toi",
            ],
            [
                "nama_kelas" => "XI",
                "kompetensi_keahlian" => "Mm",
            ],
            [
                "nama_kelas" => "XII",
                "kompetensi_keahlian" => "Rpl",
            ],
            [
                "nama_kelas" => "XII",
                "kompetensi_keahlian" => "Tkj",
            ],
            [
                "nama_kelas" => "XII",
                "kompetensi_keahlian" => "Toi",
            ],
            [
                "nama_kelas" => "XII",
                "kompetensi_keahlian" => "Mm",
            ],
        ]);
    }
}
