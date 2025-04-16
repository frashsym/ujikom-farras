<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\SppSeeder;
use Database\Seeders\KelasSeeder;
use Database\Seeders\SiswaSeeder;
use Database\Seeders\PembayaranSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'username' => 'testuser',
        //     'password' => bcrypt('1234567890'), // password
        //     'nama' => 'Test User',
        // ]);
        $this->call([
            UserSeeder::class,
            KelasSeeder::class,
            SppSeeder::class,
            SiswaSeeder::class,
            PembayaranSeeder::class,
        ]);
    }
}
