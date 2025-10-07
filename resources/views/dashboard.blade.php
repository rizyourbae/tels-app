<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TELS Dashboard - Mahasiswa</title>
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

        .card {
            transition: all 0.3s ease;
            border-radius: 1rem;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.375rem 1rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 600;
            gap: 0.5rem;
        }

        .status-selesai {
            background-color: #D1FAE5;
            color: #065F46;
        }

        .status-terdaftar {
            background-color: #FEF3C7;
            color: #92400E;
        }

        .tels-card {
            transition: all 0.3s ease;
            border-radius: 1rem;
        }

        .tels-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 250px 1fr;
        }

        .dashboard-header {
            background: linear-gradient(135deg, #065F46 0%, #047857 100%);
            color: white;
            border-radius: 1rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .stat-card {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .stat-icon {
            width: 3rem;
            height: 3rem;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .stat-icon.blue {
            background-color: #DBEAFE;
            color: #1E40AF;
        }

        .stat-icon.green {
            background-color: #D1FAE5;
            color: #065F46;
        }

        .stat-icon.yellow {
            background-color: #FEF3C7;
            color: #92400E;
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
    <div class="dashboard-grid  min-h-screen">
        <div class="sidebar shadow-lg p-4">
            <div class="flex items-center mb-8">
                <div class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-graduation-cap text-white"></i>
                </div>
                <h1 class="text-xl font-bold text-white">UPB UINSI</h1>
            </div>

            <nav>
                <a href="{{ route('dashboard') }}" class="nav-item active flex items-center px-4 py-3 mb-2">
                    <i class="fas fa-home mr-3"></i> Dashboard
                </a>
                <a href="{{ route('tels.register.create') }}"
                    class="nav-item flex items-center px-4 py-3 rounded-lg mb-2">
                    <i class="fas fa-book mr-3"></i> Daftar TELS
                </a>
                <a href="{{ route('profile.edit') }}" class="nav-item flex items-center px-4 py-3 rounded-lg mb-2">
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

            @if (session('success'))
                <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            @if (session('error'))
                <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md" role="alert">
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            <div class="dashboard-header">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div>
                        <h2 class="text-xl font-bold text-white">Status Pendaftaran TELS</h2>
                        <p class="text-white text-opacity-80 mt-1">Informasi terbaru tentang pendaftaran dan tes Anda
                        </p>
                    </div>
                    @if ($pendaftaran)
                        @if ($pendaftaran->status == \App\Enums\PendaftaranStatus::TERDAFTAR)
                            <span class="status-badge status-terdaftar mt-2 md:mt-0">
                                <i class="fas fa-clock"></i>
                                {{ $pendaftaran->status->value }}
                            </span>
                        @else
                            <span class="status-badge status-selesai mt-2 md:mt-0">
                                <i class="fas fa-check-circle"></i>
                                {{ $pendaftaran->status->value }}
                            </span>
                        @endif
                    @else
                        <span class="status-badge bg-gray-200 text-gray-800 mt-2 md:mt-0">
                            <i class="fas fa-exclamation-circle"></i>
                            Belum Terdaftar
                        </span>
                    @endif
                </div>
            </div>

            @if ($pendaftaran)
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 border-b pb-6 mb-6">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Tanggal Tes</h3>
                            <p class="mt-1 text-lg font-semibold text-dark">
                                {{ \Carbon\Carbon::parse($pendaftaran->jadwalTes->tanggal_tes)->translatedFormat('l, d F Y') }}
                            </p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Waktu & Lokasi</h3>
                            <p class="mt-1 text-lg font-semibold text-dark">
                                {{ \Carbon\Carbon::parse($pendaftaran->jadwalTes->waktu_mulai)->format('H:i') }} WITA
                                di {{ $pendaftaran->jadwalTes->lokasi }}
                            </p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Skor Total</h3>
                            <p class="mt-1 text-3xl font-bold text-primary">{{ $pendaftaran->skor_total ?? '--' }}</p>
                        </div>
                    </div>

                    <div class="text-center">
                        @if ($pendaftaran->status == \App\Enums\PendaftaranStatus::SELESAI)
                            <a href="{{ route('sertifikat.download', ['pendaftaran' => $pendaftaran->id]) }}"
                                class="bg-primary hover:bg-secondary text-white px-6 py-3 rounded-lg font-medium transition-all duration-300 hover:shadow-lg">
                                <i class="fas fa-download mr-2"></i> Download Sertifikat
                            </a>
                        @else
                            <p class="text-gray-500 italic">Sertifikat dan skor detail akan tersedia setelah tes
                                selesai.</p>
                        @endif
                    </div>
                </div>
            @else
                <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                    <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-file-alt text-primary text-5xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-dark mb-4">Anda Belum Terdaftar</h2>
                    <p class="text-gray-600 mb-8 max-w-md mx-auto">
                        Saat ini Anda belum memiliki jadwal tes TELS yang aktif. Silakan daftar untuk mendapatkan jadwal
                        tes Anda.
                    </p>
                    <a href="{{ route('tels.register.create') }}"
                        class="bg-primary hover:bg-secondary text-white px-8 py-4 rounded-lg font-semibold text-lg transition-all duration-300 hover:shadow-lg">
                        <i class="fas fa-edit mr-2"></i> Daftar TELS Sekarang
                    </a>
                </div>
            @endif
        </div>
    </div>

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
