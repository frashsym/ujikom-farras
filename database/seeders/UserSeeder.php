<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                "username" => "admin",
                "password" => bcrypt("1234567890"),
                "nama" => "Admin",
            ],
            [
                "username" => "petugas",
                "password" => bcrypt("1234567890"),
                "nama" => "Petugas",
            ],
            [
                "username" => "farras",
                "password" => bcrypt("1234567890"),
                "nama" => "Rifqi Farras Hasyim",
            ],
        ]);
    }
}
