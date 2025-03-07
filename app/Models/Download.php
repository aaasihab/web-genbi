<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;
    protected $table = 'download'; // Nama tabel di databa
    protected $fillable = [
        'nama_file',
        'file',
        'status',
    ];
}
