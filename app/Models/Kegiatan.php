<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan'; // Nama tabel di database
    protected $fillable = [
        'nama',
        'deskripsi',
        'tanggal_kegiatan',
        'gambar',
        'status'
    ];
}