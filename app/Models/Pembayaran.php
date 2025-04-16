<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = "pembayaran";
    protected $fillable = [
        'id_user',
        'nisn',
        'tanggal_bayar',
        'bulan_bayar',
        'tahun_bayar',
        'id_spp',
        'jumlah_bayar',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }
    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp', 'id');
    }
}
