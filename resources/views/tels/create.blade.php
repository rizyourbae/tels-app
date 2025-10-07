<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Konfirmasi Pendaftaran - TELS UINSI</title>

    {{-- Menggunakan CDN, BUKAN VITE --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #F0FDF4 0%, #D1FAE5 100%);
            min-height: 100vh;
        }

        .sidebar {
            transition: all 0.3s ease;
            background: linear-gradient(to bottom, #065F46, #047857);
            color: white;
        }

        .nav-item {
            transition: all 0.2s ease;
            border-radius: 0.5rem;
        }

        .nav-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #F0FDF4;
        }

        .nav-item.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            font-weight: 600;
        }

        .nav-item i {
            transition: all 0.2s ease;
        }

        .nav-item:hover i {
            color: #10B981;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 100vh;
        }

        @media (max-width: 1024px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: fixed;
                left: -250px;
                top: 0;
                height: 100%;
                z-index: 50;
                overflow-y: auto;
            }

            .sidebar.active {
                left: 0;
            }

            .overlay {
                display: none;
            }

            .overlay.active {
                display: block;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 40;
            }

            .main-content {
                padding-top: 80px;
            }
        }
    </style>
</head>

<body>
    <div class="dashboard-grid">
        <div class="sidebar shadow-lg p-4">
            <div class="flex items-center mb-8">
                <div class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-graduation-cap text-white"></i>
                </div>
                <h1 class="text-xl font-bold text-white">TELS UINSI</h1>
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
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-dark">Dashboard Mahasiswa</h1>
                    <p class="text-gray-600">Selamat datang, {{ Auth::user()->name }}</p>
                </div>
                <div class="flex items-center">
                    <div class="mr-4 text-right hidden md:block">
                        <div class="font-medium">{{ Auth::user()->name }}</div>
                        <div class="text-sm text-gray-600">{{ Auth::user()->nim ?? 'NIM belum diisi' }}</div>
                    </div>
                    <div
                        class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white text-xl font-bold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </div>
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-900">Konfirmasi Pendaftaran TELS</h1>
                <p class="text-gray-600">Silakan baca aturan pendaftaran sebelum melanjutkan</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8 max-w-3xl">
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
                    Dengan menekan tombol di bawah, Anda setuju dengan ketentuan dan akan didaftarkan ke jadwal tes yang
                    tersedia.
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
            </div>
        </div>
    </div>

    {{-- Script untuk mobile sidebar --}}
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
