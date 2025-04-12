<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model 
{
    use HasFactory;

    protected $table = 'siswas'; 

    protected $fillable = [
        'nis',
        'nama',
        'kelas_id', 
        'nomor_absen'
    ];

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'kelas_id'); 
    }
}