<?php

namespace App\Filament\Resources\PendaftaranResource\Pages;

use App\Filament\Resources\PendaftaranResource;
use App\Models\ScoreConversion;
use App\Enums\PendaftaranStatus;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPendaftaran extends EditRecord
{
    protected static string $resource = PendaftaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // --- TAMBAHKAN METHOD BARU INI ---
    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Cek jika admin menginput jumlah jawaban benar
        if (isset($data['jawaban_benar_listening'])) {

            // ... (Semua logika perhitungan skor tetap sama) ...
            $data['skor_listening'] = ScoreConversion::where('section', 'listening')
                ->where('correct_answers', (int) $data['jawaban_benar_listening'])->value('converted_score') ?? 0;

            $data['skor_structure'] = ScoreConversion::where('section', 'structure')
                ->where('correct_answers', (int) $data['jawaban_benar_structure'])->value('converted_score') ?? 0;

            $data['skor_reading'] = ScoreConversion::where('section', 'reading')
                ->where('correct_answers', (int) $data['jawaban_benar_reading'])->value('converted_score') ?? 0;

            $totalScore = ($data['skor_listening'] + $data['skor_structure'] + $data['skor_reading']);
            $data['skor_total'] = floor($totalScore / 3) * 10;

            $data['status'] = PendaftaranStatus::SELESAI;

            // --- INI BAGIAN BARUNYA ---
            // Generate nomor sertifikat hanya jika belum ada.
            if (empty($this->record->nomor_sertifikat)) {
                $bulan = now()->format('m');
                $tahun = now()->format('Y');
                // Membuat nomor urut 7 digit dari ID pendaftaran, contoh: 0000001
                $nomorUrut = str_pad($this->record->id, 7, '0', STR_PAD_LEFT);

                $data['nomor_sertifikat'] = "UPB/B/{$nomorUrut}/Un.21/PP.01.1/{$bulan}/{$tahun}";
            }
            // --- AKHIR BAGIAN BARU ---

            // --- TAMBAHAN PENTING ---
            // Setelah selesai dipakai, hapus data virtual agar tidak coba disimpan ke database.
            unset($data['jawaban_benar_listening']);
            unset($data['jawaban_benar_structure']);
            unset($data['jawaban_benar_reading']);
        }

        return $data;
    }
}
