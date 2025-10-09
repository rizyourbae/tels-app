<?php

namespace App\Services;

use App\Models\{User, JadwalTes, Pendaftaran};
use Carbon\Carbon;
use Exception;

class RegistrationService
{
    public function register(User $user, JadwalTes $jadwalTes): Pendaftaran
    {
        // Cek lagi untuk keamanan
        $isAlreadyRegistered = Pendaftaran::where('user_id', $user->id)
            ->whereHas('jadwalTes', fn($q) => $q->where('tanggal_tes', '>=', Carbon::today()))
            ->exists();

        if ($isAlreadyRegistered) {
            throw new Exception('Anda sudah terdaftar untuk tes yang akan datang.');
        }

        // Cek kuota sekali lagi sebelum menyimpan
        if ($jadwalTes->pendaftarans()->count() >= $jadwalTes->kuota) {
            throw new Exception("Maaf, kuota untuk jadwal yang Anda pilih baru saja penuh.");
        }

        // Buat data pendaftaran baru
        return Pendaftaran::create([
            'user_id' => $user->id,
            'jadwal_tes_id' => $jadwalTes->id,
        ]);
    }
}
