<?php

namespace App\Http\Controllers;

use App\Services\RegistrationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Models\Pendaftaran;
use App\Models\JadwalTes;

class TelsRegistrationController extends Controller
{
    public function create(): View
    {
        $user = Auth::user();

        // Cek dulu apakah user sudah punya pendaftaran aktif
        $activeRegistration = Pendaftaran::where('user_id', $user->id)
            ->whereHas('jadwalTes', fn($q) => $q->where('tanggal_tes', '>=', Carbon::today()))
            ->first();

        if ($activeRegistration) {
            return view('tels.create', ['isAlreadyRegistered' => true]);
        }

        // AMBIL SEMUA JADWAL DARI DATABASE YANG AKAN DATANG
        $availableSchedules = JadwalTes::where('tanggal_tes', '>=', Carbon::today())
            ->withCount('pendaftarans') // Menghitung jumlah pendaftar di setiap jadwal
            ->orderBy('tanggal_tes', 'asc')
            ->get();

        return view('tels.create', [
            'isAlreadyRegistered' => false,
            'schedules' => $availableSchedules
        ]);
    }

    public function store(Request $request, RegistrationService $registrationService): RedirectResponse
    {
        // Validasi input dari form (sekarang kita menerima ID jadwal)
        $request->validate(['jadwal_tes_id' => 'required|exists:jadwal_tes,id']);

        try {
            $user = Auth::user();
            $jadwalTes = JadwalTes::find($request->input('jadwal_tes_id'));
            $pendaftaran = $registrationService->register($user, $jadwalTes);

            $tanggalTes = Carbon::parse($pendaftaran->jadwalTes->tanggal_tes)->translatedFormat('l, d F Y');
            return redirect()->route('dashboard')->with('success', 'Pendaftaran berhasil! Anda dijadwalkan untuk tes pada hari ' . $tanggalTes);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
