<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TELS UINSI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/profile-edit.css') }}">

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
        <div class="sidebar shadow-lg p-4">
            <div class="flex items-center mb-8">
                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center mr-3">
                    <img src="{{ asset('assets/img/logo-upb.png') }}" alt="Logo TELS UINSI" class="w-8 h-8">
                </div>
                <h1 class="text-xl font-bold text-white">UPB UINSI</h1>
            </div>
            <nav>
                <a href="{{ route('dashboard') }}"
                    class="nav-item flex items-center px-4 py-3 rounded-lg mb-2 {{ request()->routeIs('dashboard') ? 'active' : '' }}">
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
                <h1 class="text-2xl font-bold text-dark">Pengaturan Akun</h1>
                <p class="text-gray-600">Kelola informasi profil, password, dan akun Anda, {{ Auth::user()->name }}.
                </p>
            </div>

            {{-- Menampilkan pesan sukses --}}
            @if (session('status') === 'profile-updated' || session('status') === 'password-updated')
                <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md" role="alert">
                    <p>Perubahan berhasil disimpan!</p>
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
                <h2 class="text-xl font-bold text-dark mb-6">Informasi Profil</h2>

                {{-- [INTEGRASI] Form dihubungkan ke route profile.update dengan method PATCH --}}
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama
                                Lengkap</label>
                            <input type="text" id="name" name="name"
                                value="{{ old('name', Auth::user()->name) }}"
                                class="input-field w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div>
                            <label for="nim" class="block text-sm font-medium text-gray-700 mb-2">NIM</label>
                            <input type="text" id="nim" name="nim"
                                value="{{ old('nim', Auth::user()->nim) }}"
                                class="input-field w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                            <x-input-error class="mt-2" :messages="$errors->get('nim')" />
                        </div>
                        <div>
                            <label for="program_studi" class="block text-sm font-medium text-gray-700 mb-2">Program
                                Studi</label>
                            <input type="text" id="program_studi" name="program_studi"
                                value="{{ old('program_studi', Auth::user()->program_studi) }}"
                                class="input-field w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                            @error('program_studi')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}"
                                class="input-field w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100"
                                readonly>
                            <p class="text-xs text-gray-500 mt-1">Email tidak dapat diubah.</p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <button type="submit"
                            class="btn bg-primary hover:bg-secondary text-white px-6 py-2 rounded-lg font-medium">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
                <h2 class="text-xl font-bold text-dark mb-6">Ubah Password</h2>

                {{-- [INTEGRASI] Form dihubungkan ke route password.update dengan method PUT --}}
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">Password
                                Saat Ini</label>
                            <input type="password" id="current_password" name="current_password"
                                class="input-field w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('current_password')" />
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password
                                Baru</label>
                            <input type="password" id="password" name="password"
                                class="input-field w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password')" />
                        </div>
                        <div>
                            <label for="password_confirmation"
                                class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password Baru</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="input-field w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password_confirmation')" />
                        </div>
                    </div>
                    <div class="mt-6">
                        <button type="submit"
                            class="btn bg-primary hover:bg-secondary text-white px-6 py-2 rounded-lg font-medium">
                            Ubah Password
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-red-500">
                <h2 class="text-xl font-bold text-danger mb-4">Hapus Akun</h2>
                <p class="text-gray-600 mb-6">
                    Setelah akun Anda dihapus, semua data terkait akan dihapus secara permanen. Harap pertimbangkan
                    baik-baik sebelum melanjutkan.
                </p>

                {{-- [INTEGRASI] Form dihubungkan ke route profile.destroy dengan method DELETE --}}
                <form method="POST" action="{{ route('profile.destroy') }}"
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini secara permanen?');">
                    @csrf
                    @method('delete')
                    <div>
                        <button type="submit"
                            class="btn bg-danger hover:bg-red-700 text-white px-6 py-2 rounded-lg font-medium">
                            Hapus Akun
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Script untuk mobile sidebar --}}
    <script src="{{ asset('assets/js/profile-edit.js') }}"></script>
</body>

</html>
