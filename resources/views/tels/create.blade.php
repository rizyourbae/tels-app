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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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
                        light: '#F9FAFB',
                        danger: '#EF4444'
                    }
                }
            }
        }
    </script>
</head>

<body>
    <div class="dashboard-grid">
        <div class="sidebar shadow-lg p-4 h-screen">
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
                <h1 class="text-2xl font-bold text-dark">Pilih Jadwal Tes TELS</h1>
                <p class="text-gray-600">Kuota terbatas dan diisi berdasarkan urutan pendaftaran.</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8">
                {{-- Menampilkan pesan error jika ada --}}
                @if (session('error'))
                    <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md" role="alert">
                        <p>{{ session('error') }}</p>
                    </div>
                @endif
                {{-- [LOGIKA BARU] Cek variabel dari controller --}}
                @if ($isAlreadyRegistered)
                    {{-- TAMPILAN JIKA SUDAH TERDAFTAR --}}
                    <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                        <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-check-circle text-green-600 text-5xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-dark mb-4">Anda Sudah Terdaftar</h2>
                        <p class="text-gray-600 mb-8 max-w-md mx-auto">
                            Anda sudah memiliki jadwal tes TELS yang aktif. Silakan periksa dashboard Anda untuk melihat
                            detail jadwal.
                        </p>
                        <a href="{{ route('dashboard') }}"
                            class="btn bg-primary hover:bg-secondary text-white px-8 py-4 rounded-lg font-semibold text-lg">
                            Kembali ke Dashboard
                        </a>
                    </div>
                @else
                    {{-- Tampilan jika BELUM terdaftar --}}
                    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8">

                        {{-- LOOPING SEMUA JADWAL YANG TERSEDIA --}}
                        @forelse ($schedules as $schedule)
                            @php
                                $sisaKuota = $schedule->kuota - $schedule->pendaftarans_count;
                            @endphp
                            <div class="schedule-card bg-white rounded-xl shadow-lg p-6 flex flex-col">
                                <h2 class="text-xl font-bold text-dark mb-4">
                                    Jadwal Hari
                                    {{ \Carbon\Carbon::parse($schedule->tanggal_tes)->translatedFormat('l') }}</h2>
                                <p class="text-lg font-semibold text-primary mb-6">
                                    {{ \Carbon\Carbon::parse($schedule->tanggal_tes)->translatedFormat('d F Y') }}</p>

                                <div class="flex items-center mb-6">
                                    <i class="fas fa-users text-gray-500 mr-2"></i>
                                    <span class="text-gray-600 mr-2">Sisa Kuota:</span>
                                    <span
                                        class="text-xl font-bold {{ $sisaKuota > 5 ? 'text-primary' : 'text-danger' }}">
                                        {{ $sisaKuota }} <span class="text-gray-800 text-base font-medium">/
                                            {{ $schedule->kuota }}</span>
                                    </span>
                                </div>

                                {{-- [BARU] Bagian Jam --}}
                                <div class="info-row">
                                    <i class="fas fa-clock info-icon"></i>
                                    <span
                                        class="text-gray-600">{{ \Carbon\Carbon::parse($schedule->jam_mulai)->format('H:i') }}
                                        - {{ \Carbon\Carbon::parse($schedule->jam_selesai)->format('H:i') }} WIB</span>
                                </div>

                                {{-- [BARU] Bagian Lokasi --}}
                                <div class="info-row">
                                    <i class="fas fa-map-marker-alt info-icon"></i>
                                    <span class="text-gray-600">{{ $schedule->lokasi }}</span>
                                </div>

                                <div class="mt-auto pt-4">
                                    @if ($sisaKuota > 0)
                                        <form method="POST" action="{{ route('tels.register.store') }}">
                                            @csrf
                                            <input type="hidden" name="jadwal_tes_id" value="{{ $schedule->id }}">
                                            <button type="submit"
                                                class="btn w-full bg-primary hover:bg-secondary text-white px-6 py-3 rounded-lg font-medium transition duration-300">
                                                Pilih Jadwal Ini
                                            </button>
                                        </form>
                                    @else
                                        <button
                                            class="w-full bg-gray-300 text-gray-500 px-6 py-3 rounded-lg font-medium cursor-not-allowed"
                                            disabled>
                                            Kuota Penuh
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @empty
                            {{-- Tampilan jika tidak ada jadwal sama sekali --}}
                            <div class="lg:col-span-2 xl:col-span-3 bg-white rounded-xl shadow-lg p-8 text-center">
                                <div
                                    class="w-24 h-24 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <i class="fas fa-calendar-times text-yellow-600 text-5xl"></i>
                                </div>
                                <h2 class="text-2xl font-bold text-dark mb-4">Belum Ada Jadwal Tersedia</h2>
                                <p class="text-gray-600 max-w-md mx-auto">
                                    Saat ini belum ada jadwal tes TELS yang dibuka oleh admin. Silakan cek kembali
                                    nanti.
                                </p>
                            </div>
                        @endforelse
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Mobile Sidebar Toggle --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.createElement('button');
            sidebarToggle.innerHTML = '<i class="fas fa-bars"></i>';
            sidebarToggle.className =
                'lg:hidden fixed top-4 left-4 z-50 bg-primary text-white w-12 h-12 rounded-lg shadow-lg';
            document.body.appendChild(sidebarToggle);

            const sidebar = document.querySelector('.sidebar');
            const overlay = document.createElement('div');
            overlay.className = 'overlay';
            document.body.appendChild(overlay);

            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                overlay.classList.toggle('active');
            });

            overlay.addEventListener('click', function() {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
            });
        });
    </script>
</body>

</html>
