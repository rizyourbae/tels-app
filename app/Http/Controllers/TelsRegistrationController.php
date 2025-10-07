<?php

namespace App\Http\Controllers;

use App\Services\RegistrationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Carbon\Carbon;

class TelsRegistrationController extends Controller
{
    // Method untuk menampilkan halaman konfirmasi
    public function create(): View
    {
        return view('tels.create');
    }

    // Method untuk memproses pendaftaran
    public function store(RegistrationService $registrationService): RedirectResponse
    {
        try {
            $user = Auth::user();
            $pendaftaran = $registrationService->register($user);

            // Format tanggal agar lebih mudah dibaca di pesan sukses
            $tanggalTes = Carbon::parse($pendaftaran->jadwalTes->tanggal_tes)->translatedFormat('l, d F Y');

            // --- INI BAGIAN KUNCINYA ---
            // Jika berhasil, redirect ke dashboard dengan pesan sukses.
            return redirect()->route('dashboard')->with('success', 'Pendaftaran berhasil! Anda dijadwalkan untuk tes pada hari ' . $tanggalTes);
        } catch (\Exception $e) {
            // Jika gagal (misal: kuota penuh), kembali ke halaman sebelumnya dengan pesan error.
            return back()->with('error', $e->getMessage());
        }
    }
}
