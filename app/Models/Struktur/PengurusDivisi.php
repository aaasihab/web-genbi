<?php

namespace App\Models\Struktur;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengurusDivisi extends Model
{
    use HasFactory;
    protected $table = 'pengurus_divisi';
    protected $fillable = ['divisi_id', 'nama', 'jabatan', 'foto', 'status'];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}
