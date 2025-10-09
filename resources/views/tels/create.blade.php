<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TELS UINSI</title>

    {{-- Menggunakan CDN, BUKAN VITE --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/tels-create.css') }}">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#065F46',
                        secondary: '#047857',
                        accent: '#10B981',
                        dark: '#1F2937',
                        light: '#F9FAFB'
                    }
                }
            }
        }
    </script>


</head>

<body>
    <div class="dashboard-grid">
        <div class="sidebar shadow-lg p-4">
            <div class="flex items-center mb-8">
                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center mr-3">
                    <img src="{{ asset('assets/img/logo-upb.png') }}" alt="Logo TELS UINSI" class="w-8 h-8">
                </div>
                <h1 class="text-xl font-bold text-white">UPB UINSI</h1>
            </div>
            <nav>
                <a href="{{ route('dashboard') }}"
                    class="nav-item flex items-center px-4 py-3 mb-2 {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home mr-3"></i> Dashboard
                </a>
                <a href="{{ route('tels.register.create') }}"
                    class="nav-item flex items-center px-4 py-3 rounded-lg mb-2 {{ request()->routeIs('tels.register.create') ? 'active' : '' }}">
                    <i class="fas fa-book mr-3"></i> Daftar TELS
                </a>
                <a href="{{ route('profile.edit') }}"
                    class="nav-item flex items-center px-4 py-3 rounded-lg mb-2 {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                    <i class="fas fa-user mr-3"></i> Profile
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                        class="nav-item flex items-center w-full px-4 py-3 rounded-lg">
                        <i class="fas fa-sign-out-alt mr-3"></i> Logout
                    </a>
                </form>
            </nav>
        </div>

        <div class="p-4 md:p-8 main-content">
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-900">Konfirmasi Pendaftaran TELS</h1>
                <p class="text-gray-600">Silakan baca aturan pendaftaran sebelum melanjutkan</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8">
                {{-- [LOGIKA BARU] Cek variabel dari controller --}}
                @if ($isAlreadyRegistered)
                    {{-- TAMPILAN JIKA SUDAH TERDAFTAR --}}
                    <div class="text-center">
                        <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-check-circle text-green-600 text-5xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-dark mb-4">Anda Sudah Terdaftar</h2>
                        <p class="text-gray-600 mb-8 max-w-md mx-auto">
                            Anda sudah memiliki jadwal tes TELS yang aktif. Silakan periksa dashboard Anda untuk melihat
                            detail jadwal.
                        </p>
                        <a href="{{ route('dashboard') }}"
                            class="bg-primary hover:bg-secondary text-white px-8 py-4 rounded-lg font-semibold text-lg">
                            Kembali ke Dashboard
                        </a>
                    </div>
                @else
                    {{-- TAMPILAN JIKA BELUM TERDAFTAR (KODE LAMA ANDA) --}}
                    <h2 class="text-xl font-bold text-gray-800 mb-6">Aturan Pendaftaran TELS</h2>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start">
                            <div
                                class="flex-shrink-0 h-6 w-6 rounded-full bg-green-100 flex items-center justify-center mr-3 mt-1">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            <p class="text-gray-700">Kuota pendaftaran adalah 50 orang per minggu.</p>
                        </li>
                        <li class="flex items-start">
                            <div
                                class="flex-shrink-0 h-6 w-6 rounded-full bg-green-100 flex items-center justify-center mr-3 mt-1">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            <p class="text-gray-700">25 pendaftar pertama akan dijadwalkan pada hari Senin.</p>
                        </li>
                        <li class="flex items-start">
                            <div
                                class="flex-shrink-0 h-6 w-6 rounded-full bg-green-100 flex items-center justify-center mr-3 mt-1">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            <p class="text-gray-700">25 pendaftar berikutnya akan dijadwalkan pada hari Rabu.</p>
                        </li>
                    </ul>
                    <p class="text-gray-700 mb-8">
                        Dengan menekan tombol di bawah, Anda setuju dengan ketentuan dan akan didaftarkan ke jadwal tes
                        yang tersedia.
                    </p>
                    <form method="POST" action="{{ route('tels.register.store') }}">
                        @csrf
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('dashboard') }}"
                                class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-6 py-3 bg-primary hover:bg-secondary text-white font-medium rounded-lg transition duration-300">
                                Ya, Daftarkan Saya
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>

    {{-- Script untuk mobile sidebar --}}
    <script src="{{ asset('assets/js/tels-create.js') }}"></script>
</body>

</html>
