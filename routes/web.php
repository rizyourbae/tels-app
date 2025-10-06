<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\TelsRegistrationController;

Route::get('/', function () {
    if (Auth::check()) {
        // Jika user sudah login, arahkan ke dashboard
        return redirect()->route('dashboard');
    }
    // Jika belum login, arahkan ke halaman login
    return redirect()->route('login');
});

//Route::get('/dashboard', function () {
//return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [StudentDashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/tels/register', [TelsRegistrationController::class, 'create'])->name('tels.register.create');
    Route::post('/tels/register', [TelsRegistrationController::class, 'store'])->name('tels.register.store');
});

require __DIR__ . '/auth.php';
