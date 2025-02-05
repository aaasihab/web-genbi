<?php

namespace App\Models\Struktur;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengurusHarian extends Model
{
    use HasFactory;
    protected $table = 'pengurus_harian';
    protected $fillable = ['organisasi_id', 'nama', 'jabatan', 'foto'];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }
}
