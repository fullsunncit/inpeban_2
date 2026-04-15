<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapan';

    protected $fillable = [
        'pengaduan_id',
        'petugas_id',
        'isi_tanggapan'
    ];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }
}
