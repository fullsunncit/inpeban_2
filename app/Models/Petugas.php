<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';

    protected $fillable = [
        'nama_petugas',
        'kontak_petugas',
        'level',
        'username',
        'password'
    ];

    protected $hidden = [
        'password'
    ];

    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class);
    }
}
