<?php

namespace App\Observers;

// Pastikan Enum di-import di atas
use App\Enums\PendaftaranStatus;
use App\Models\Pendaftaran;
use App\Models\ScoreConversion;

class PendaftaranObserver
{
    public function saving(Pendaftaran $pendaftaran): void {}
}
