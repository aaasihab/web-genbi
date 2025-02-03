<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan'; // Nama tabel di database

    protected $primaryKey = 'id'; // Primary Key

    protected $fillable = [
        'nama',
        'deskripsi',
        'tanggal',
        'gambar'
    ];
}