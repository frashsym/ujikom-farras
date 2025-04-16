<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spp')->insert([
            [
                "tahun" => "2025",
                "nominal" => "50000",
            ],
            [
                "tahun" => "2024",
                "nominal" => "100000",
            ],
            [
                "tahun" => "2023",
                "nominal" => "150000",
            ],
            [
                "tahun" => "2022",
                "nominal" => "200000",
            ],
        ]);
    }
}
