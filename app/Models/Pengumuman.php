<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
    protected $table = 'pengumuman'; // Nama tabel di database
    protected $primaryKey = 'id'; // Primary Key
    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'file_download',
        'status'
    ];

}
