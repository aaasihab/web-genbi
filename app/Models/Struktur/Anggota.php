<?php

namespace App\Models\Struktur;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    protected $fillable = ['divisi_id', 'nama', 'foto', 'status'];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}
