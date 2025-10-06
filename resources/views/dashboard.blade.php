<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Student Dashboard - TELS Portal</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Custom styles Anda bisa tetap di sini atau dipindah ke app.css */
        .status-card {
            transition: all 0.3s ease;
        }

        .status-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen font-sans antialiased">
    <div x-data="{ open: false }" class="w-full">
        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="{{ route('dashboard') }}" class="flex-shrink-0 flex items-center">
                            <i class="fas fa-university text-green-700 text-2xl mr-3"></i>
                            <span class="text-xl font-bold text-gray-900">TELS UINSI Samarinda</span>
                        </a>
                    </div>
                    <div class="flex items-center">
                        <div @click.away="open = false" class="ml-3 relative" x-data="{ open: false }">
                            <div>
                                <button @click="open = !open"
                                    class="flex items-center text-sm rounded-full focus:outline-none">
                                    <span class="mr-3 text-gray-700 hidden sm:inline">Welcome,
                                        {{ Auth::user()->name }}</span>
                                    <i class="fas fa-chevron-down text-gray-500"></i>
                                </button>
                            </div>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 z-50">
                                <a href="{{ route('profile.edit') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Log Out
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

                {{-- Menampilkan pesan sukses atau error dari session --}}
                @if (session('success'))
                    <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md"
                        role="alert">
                        <p class="font-bold">Success</p>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
                @if (session('error'))
                    <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md" role="alert">
                        <p class="font-bold">Error</p>
                        <p>{{ session('error') }}</p>
                    </div>
                @endif


                {{-- [LOGIKA BLADE] Cek apakah mahasiswa sudah terdaftar atau belum --}}
                @if ($pendaftaran === null)

                    <div class="text-center py-12">
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">Selamat Datang di Portal TELS</h1>

                        <div class="bg-white rounded-2xl shadow-xl p-8 max-w-md mx-auto status-card">
                            <div class="flex justify-center mb-6">
                                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-graduation-cap text-green-600 text-4xl"></i>
                                </div>
                            </div>

                            <h2 class="text-2xl font-bold text-gray-900 mb-4">Anda Belum Terdaftar</h2>
                            <p class="text-gray-600 mb-8">
                                Segera daftarkan diri Anda untuk tes TELS minggu ini dan dapatkan jadwal Anda secara
                                otomatis.
                            </p>

                            <a href="{{ route('tels.register.create') }}"
                                class="btn inline-flex items-center px-6 py-4 bg-green-700 hover:bg-green-800 text-white font-semibold rounded-lg shadow-md">
                                <i class="fas fa-edit mr-3"></i> Daftar TELS Sekarang
                            </a>
                        </div>
                    </div>
                @else
                    <div class="text-center py-8">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Status Pendaftaran Anda</h1>
                        <p class="text-gray-600">Detail pendaftaran dan informasi tes Anda.</p>
                    </div>

                    <div class="bg-white rounded-2xl shadow-xl p-8 max-w-2xl mx-auto status-card">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-6">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500">Status Pendaftaran</h3>
                                    <div class="mt-2">
                                        @if ($pendaftaran->status == \App\Enums\PendaftaranStatus::TERDAFTAR)
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                                <i class="fas fa-clock mr-2"></i> {{ $pendaftaran->status->value }}
                                            </span>
                                        @elseif ($pendaftaran->status == \App\Enums\PendaftaranStatus::SELESAI)
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                                <i class="fas fa-check-circle mr-2"></i>
                                                {{ $pendaftaran->status->value }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div>
                                    <h3 class="text-sm font-medium text-gray-500">Tanggal Tes</h3>
                                    <div class="mt-1 text-lg font-medium text-gray-900">
                                        {{ \Carbon\Carbon::parse($pendaftaran->jadwalTes->tanggal_tes)->translatedFormat('l, d F Y') }}
                                    </div>
                                </div>

                                <div>
                                    <h3 class="text-sm font-medium text-gray-500">Waktu</h3>
                                    <div class="mt-1 text-lg font-medium text-gray-900">
                                        {{ \Carbon\Carbon::parse($pendaftaran->jadwalTes->waktu_mulai)->format('H:i') }}
                                        WITA</div>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500">Lokasi</h3>
                                    <div class="mt-1 text-lg font-medium text-gray-900">
                                        {{ $pendaftaran->jadwalTes->lokasi }}</div>
                                </div>

                                @if ($pendaftaran->status == \App\Enums\PendaftaranStatus::SELESAI)
                                    <div>
                                        <h3 class="text-sm font-medium text-gray-500">Skor Total</h3>
                                        <div class="mt-1 text-3xl font-bold text-green-600">
                                            {{ $pendaftaran->skor_total }}</div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mt-10 pt-6 border-t border-gray-200 text-center">
                            @if ($pendaftaran->status == \App\Enums\PendaftaranStatus::SELESAI)
                                {{-- Kita beri # dulu karena route download belum dibuat --}}
                                <a href="#"
                                    class="btn inline-flex items-center px-6 py-4 bg-green-700 hover:bg-green-800 text-white font-semibold rounded-lg shadow-md">
                                    <i class="fas fa-download mr-3"></i> Download Sertifikat
                                </a>
                            @else
                                <span class="inline-block px-4 py-2 text-sm text-gray-500 bg-gray-100 rounded-lg">
                                    <i class="fas fa-info-circle mr-2"></i> Sertifikat akan tersedia setelah tes
                                    selesai.
                                </span>
                            @endif
                        </div>
                    </div>

                @endif
            </div>
        </main>
    </div>
</body>

</html>
