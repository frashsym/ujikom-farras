<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('nisn', 10)->primary();
            $table->string('nis', 10)->unique();
            $table->string('nama');
            $table->unsignedBigInteger('id_kelas');
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            $table->text('alamat');
            $table->string('no_telp', 15);
            $table->unsignedBigInteger('id_spp');
            $table->foreign('id_spp')->references('id')->on('spp')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
        Schema::table('siswa', function (Blueprint $table) {
            $table->dropForeign(['id_kelas']);
            $table->dropForeign(['id_spp']);
        });
        Schema::dropIfExists('kelas');
        Schema::dropIfExists('spp');
    }
};
