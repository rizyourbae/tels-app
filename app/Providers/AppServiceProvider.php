<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\PendaftaranObserver;
use App\Models\Pendaftaran;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Pendaftaran::observe(PendaftaranObserver::class);
        User::created(function (User $user) {
            // Otomatis berikan role 'Mahasiswa' ke setiap user baru
            // yang bukan admin.
            if (! $user->hasRole(['Super Admin', 'Admin'])) {
                $user->assignRole('Mahasiswa');
            }
        });
    }
}
