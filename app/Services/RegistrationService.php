<?php

namespace App\Services;

use App\Models\{User, JadwalTes, Pendaftaran};
use Carbon\Carbon;
use Carbon\CarbonInterface; // <-- 1. Tambahkan use statement ini
use Exception;

class RegistrationService
{
    /**
     * Mendaftarkan seorang user ke jadwal tes TELS.
     *
     * @param User $user
     * @return Pendaftaran
     * @throws Exception
     */
    public function register(User $user): Pendaftaran
    {
        // Cek apakah user sudah punya pendaftaran aktif
        $isAlreadyRegistered = Pendaftaran::where('user_id', $user->id)
            ->whereHas('jadwalTes', function ($query) {
                $query->where('tanggal_tes', '>=', Carbon::now());
            })->exists();

        if ($isAlreadyRegistered) {
            throw new Exception('Anda sudah terdaftar untuk tes yang akan datang.');
        }

        // Hitung jumlah pendaftar di minggu ini
        // <-- 2. Ganti Carbon::MONDAY/SUNDAY menjadi CarbonInterface::MONDAY/SUNDAY
        $startOfWeek = Carbon::now()->startOfWeek(CarbonInterface::MONDAY);
        $endOfWeek = Carbon::now()->endOfWeek(CarbonInterface::SUNDAY);

        $weeklyRegistrationsCount = Pendaftaran::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();

        // Cek kuota mingguan
        if ($weeklyRegistrationsCount >= 50) {
            throw new Exception('Maaf, kuota pendaftaran untuk minggu ini sudah penuh.');
        }

        // Tentukan hari tes berdasarkan jumlah pendaftar
        // <-- 3. Ganti Carbon::MONDAY/WEDNESDAY menjadi CarbonInterface::MONDAY/WEDNESDAY
        $testDay = ($weeklyRegistrationsCount < 25) ? CarbonInterface::MONDAY : CarbonInterface::WEDNESDAY;
        $testDate = Carbon::now()->next($testDay);

        // Cari atau buat jadwal tes untuk tanggal tersebut
        $jadwalTes = JadwalTes::firstOrCreate(
            ['tanggal_tes' => $testDate->format('Y-m-d')],
            [
                'waktu_mulai' => '08:00:00',
                'lokasi' => 'Laboratorium Bahasa',
                'kuota' => 25,
            ]
        );

        // Buat data pendaftaran baru
        $pendaftaran = Pendaftaran::create([
            'user_id' => $user->id,
            'jadwal_tes_id' => $jadwalTes->id,
        ]);

        return $pendaftaran;
    }
}
