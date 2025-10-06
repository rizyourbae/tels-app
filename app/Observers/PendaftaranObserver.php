<?php

namespace App\Observers;

// Pastikan Enum di-import di atas
use App\Enums\PendaftaranStatus;
use App\Models\Pendaftaran;
use App\Models\ScoreConversion;

class PendaftaranObserver
{
    public function saving(Pendaftaran $pendaftaran): void
    {
        $jawabanBenarListening = request('data.jawaban_benar_listening');
        $jawabanBenarStructure = request('data.jawaban_benar_structure');
        $jawabanBenarReading = request('data.jawaban_benar_reading');

        if (isset($jawabanBenarListening) || isset($jawabanBenarStructure) || isset($jawabanBenarReading)) {

            // ... (logika konversi skor lainnya tetap sama) ...
            $pendaftaran->skor_reading = ScoreConversion::where('section', 'reading')
                ->where('correct_answers', (int) $jawabanBenarReading)->value('converted_score') ?? 0;

            $totalScore = ($pendaftaran->skor_listening + $pendaftaran->skor_structure + $pendaftaran->skor_reading);
            $pendaftaran->skor_total = floor($totalScore / 3) * 10;

            // --- INI BAGIAN YANG DIPERBAIKI ---
            $pendaftaran->status = PendaftaranStatus::SELESAI;
        }
    }
}
