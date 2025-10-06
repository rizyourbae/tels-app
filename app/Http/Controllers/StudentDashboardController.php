<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftaran;
use Carbon\Carbon;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Cari pendaftaran aktif atau yang terakhir selesai
        $pendaftaran = Pendaftaran::where('user_id', $user->id)
            ->whereHas('jadwalTes', function ($query) {
                // Ambil pendaftaran untuk tes yang akan datang
                // ATAU tes yang baru saja selesai dalam 30 hari terakhir
                $query->where('tanggal_tes', '>=', Carbon::now()->subDays(30));
            })
            ->with('jadwalTes') // Eager load relasi untuk efisiensi
            ->latest()
            ->first();

        return view('dashboard', ['pendaftaran' => $pendaftaran]);
    }
}
