<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;
    protected $table = 'download'; // Nama tabel di database

    protected $primaryKey = 'id'; // Primary Key

    protected $fillable = [
        'nama_file',
        'file',
        'status',
    ];
}
