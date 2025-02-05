<?php

namespace App\Models\Struktur;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $table = 'divisi';
    protected $fillable = ['organisasi_id', 'nama'];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }

    public function pengurusDivisi()
    {
        return $this->hasMany(PengurusDivisi::class);
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }
}
