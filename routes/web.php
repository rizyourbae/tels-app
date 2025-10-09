<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\TelsRegistrationController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CertificateVerificationController;

Route::get('/', function () {
    if (Auth::check()) {
        // Jika user sudah login, arahkan ke dashboard
        return redirect()->route('dashboard');
    }
    // Jika belum login, arahkan ke halaman login
    return redirect()->route('login');
});

Route::get('/sertifikat/verify/{uuid}', [CertificateVerificationController::class, 'show'])->name('sertifikat.verify');

Route::get('/dashboard', [StudentDashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'role:Mahasiswa'])->name('dashboard');

Route::middleware(['auth', 'verified', 'role:Mahasiswa'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/tels/register', [TelsRegistrationController::class, 'create'])->name('tels.register.create');
    Route::post('/tels/register', [TelsRegistrationController::class, 'store'])->name('tels.register.store');
    Route::get('/sertifikat/{pendaftaran}/download', [CertificateController::class, 'download'])->name('sertifikat.download');
});

require __DIR__ . '/auth.php';
