<?php

namespace App\Models\Struktur;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;
    protected $table = 'organisasi';
    protected $fillable = ['nama'];

    public function pengurusHarian()
    {
        return $this->hasMany(PengurusHarian::class);
    }

    public function divisi()
    {
        return $this->hasMany(Divisi::class);
    }
}
