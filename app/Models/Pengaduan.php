<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';

    protected $fillable = [
        'pengguna_id',
        'judul',
        'isi_laporan',
        'foto',
        'status'
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }

    public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class);
    }

}
