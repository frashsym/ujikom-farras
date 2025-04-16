<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = "siswa";
    protected $fillable = [
        'nisn',
        'nis',
        'nama',
        'id_kelas',
        'alamat',
        'no_telp',
        'id_spp',
    ];

    protected $primaryKey = 'nisn';
    public $incrementing = false;
    protected $keyType = 'string';

    public function getRouteKeyName()
    {
        return 'nisn';
    }


    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }
    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp', 'id');
    }
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'nisn', 'nisn');
    }
}
