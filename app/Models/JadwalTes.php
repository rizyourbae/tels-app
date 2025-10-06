<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JadwalTes extends Model
{
    use HasFactory;

    protected $table = 'jadwal_tes';

    protected $fillable = [
        'tanggal_tes',
        'waktu_mulai',
        'lokasi',
        'kuota',
    ];

    protected $casts = [
        'tanggal_tes' => 'date',
        'waktu_mulai' => 'datetime:H:i',
        'kuota' => 'integer',
    ];

    public function pendaftarans(): HasMany
    {
        return $this->hasMany(Pendaftaran::class, 'jadwal_tes_id');
    }
}
