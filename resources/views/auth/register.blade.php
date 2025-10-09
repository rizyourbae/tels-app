<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TELS UINSI - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/register-layout.css') }}">
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
    <div class="split-screen">
        <div class="left-column">
            <div class="logo-container">
                <div class="logo">
                    <img src="{{ asset('assets/img/logo-uinsi.png') }}" alt="Logo UINSI"
                        class="w-full h-full object-contain p-2">
                </div>
                <div class="logo-text">
                    UIN SULTAN AJI<br>MUHAMMAD IDRIS<br>SAMARINDA
                </div>
            </div>
        </div>

        <div class="right-column">
            <div class="register-card">
                <h1 class="text-2xl font-bold text-center mb-2" style="color: #065F46;">Create Your Account</h1>
                <p class="text-center text-gray-600 mb-6">Register To Join TELS Test</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="input-group">
                        <label class="input-label" for="name">Full Name</label>
                        <input type="text" id="name" name="name" class="input-field" placeholder="John Doe"
                            value="{{ old('name') }}" required autofocus autocomplete="name">
                        @error('name')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- [PENAMBAHAN] Input untuk NIM --}}
                    <div class="input-group">
                        <label class="input-label" for="nim">NIM</label>
                        <input type="text" id="nim" name="nim" class="input-field" placeholder="1234567890"
                            value="{{ old('nim') }}" required autocomplete="nim">
                        @error('nim')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- [PENAMBAHAN] Input untuk Program Studi --}}
                    <div class="input-group">
                        <label class="input-label" for="program_studi">Program Studi</label>
                        <input type="text" id="program_studi" name="program_studi" class="input-field"
                            placeholder="Tadris Bahasa Inggris" value="{{ old('program_studi') }}" required
                            autocomplete="program_studi">
                        @error('program_studi')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label class="input-label" for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="input-field"
                            placeholder="student@uinsamida.ac.id" value="{{ old('email') }}" required
                            autocomplete="username">
                        @error('email')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label class="input-label" for="password">Password</label>
                        <input type="password" id="password" name="password" class="input-field" placeholder="••••••••"
                            required autocomplete="new-password">
                        @error('password')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label class="input-label" for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="input-field" placeholder="••••••••" required autocomplete="new-password">
                        @error('password_confirmation')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="register-button">
                        <i class="fas fa-user-plus mr-2"></i> Register
                    </button>
                </form>

                <div class="login-link">
                    Already have an account? <a href="{{ route('login') }}">Login</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
