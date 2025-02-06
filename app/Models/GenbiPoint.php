<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenbiPoint extends Model
{
    use HasFactory;
    protected $table = 'genbi_point'; // Nama tabel di database

    protected $fillable = [
        'bulan',
        'link_drive',
        'status',
    ];
}
