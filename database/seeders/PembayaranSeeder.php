<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pembayaran')->insert([
            [
                "id_user" => 1,
                "nisn" => 1000,
                "tanggal_bayar" => "2025-04-16",
                "bulan_bayar" => "April",
                "tahun_bayar" => "2025",
                "id_spp" => 1,
                "jumlah_bayar" => 50000,
            ],
            [
                "id_user" => 2,
                "nisn" => 1001,
                "tanggal_bayar" => "2025-04-15",
                "bulan_bayar" => "April",
                "tahun_bayar" => "2025",
                "id_spp" => 2,
                "jumlah_bayar" => 100000,
            ],
            [
                "id_user" => 3,
                "nisn" => 1003,
                "tanggal_bayar" => "2025-04-14",
                "bulan_bayar" => "April",
                "tahun_bayar" => "2025",
                "id_spp" => 3,
                "jumlah_bayar" => 150000,
            ],
        ]);
    }
}
