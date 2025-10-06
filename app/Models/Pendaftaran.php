<?php

namespace App\Models;

use App\Enums\PendaftaranStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftarans';

    protected $fillable = [
        'user_id',
        'jadwal_tes_id',
        'status',
        'skor_listening',
        'skor_structure',
        'skor_reading',
        'skor_total',
    ];

    protected $casts = [
        'status' => PendaftaranStatus::class,
        'skor_listening' => 'integer',
        'skor_structure' => 'integer',
        'skor_reading' => 'integer',
        'skor_total' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function jadwalTes(): BelongsTo
    {
        return $this->belongsTo(JadwalTes::class, 'jadwal_tes_id');
    }
}
