<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna';

    protected $fillable = [
        'nama_lengkap',
        'email',
        'kontak',
        'username',
        'password'
    ];

    protected $hidden = [
        'password'
    ];

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }
}
