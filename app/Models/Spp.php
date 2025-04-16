<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    protected $table = "spp";
    protected $fillable = [
        'tahun',
        'nominal',
    ];
    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_spp', 'id');
    }
}
