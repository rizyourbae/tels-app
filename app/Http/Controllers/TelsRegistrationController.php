<?php

namespace App\Http\Controllers;

use App\Services\RegistrationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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

            $tanggalTes = \Carbon\Carbon::parse($pendaftaran->jadwalTes->tanggal_tes)->translatedFormat('l, d F Y');

            return redirect()->route('dashboard')->with('success', 'Pendaftaran berhasil! Anda dijadwalkan untuk tes pada hari ' . $tanggalTes);
        } catch (\Exception $e) {
            // Jika gagal (misal: kuota penuh), kembali dengan pesan error
            return back()->with('error', $e->getMessage());
        }
    }
}
