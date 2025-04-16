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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('nisn');
            $table->foreign('nisn')->references('nisn')->on('siswa')->onDelete('cascade');
            $table->date('tanggal_bayar');
            $table->string('bulan_bayar', 20);
            $table->string('tahun_bayar', 4);
            $table->unsignedBigInteger('id_spp');
            $table->foreign('id_spp')->references('id')->on('spp')->onDelete('cascade');
            $table->integer('jumlah_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropForeign(['nisn']);
            $table->dropForeign(['id_spp']);
        });
        Schema::dropIfExists('users');
        Schema::dropIfExists('siswa');
    }
};
