<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TELS UINSI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/login-layout.css') }}">

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
        <!-- Left Column -->
        <div class="left-column">
            <div class="logo-container">
                <div class="logo">
                    <img src="{{ asset('assets/img/logo-uinsi.png') }}" alt="Logo UINSI"
                        class="w-full h-full object-contain p-2">
                </div>
                <div class="logo-text">
                    UIN SULTAN AJI<br>
                    MUHAMMAD IDRIS<br>
                    SAMARINDA
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="right-column">
            <div class="login-card">
                <h1 class="text-2xl font-bold text-center mb-6" style="color: #065F46;">Student Portal Login</h1>

                <!-- Session Status -->
                <div class="success-message" style="display: none;">
                    <!-- Success message will appear here -->
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group">
                        <label class="input-label" for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="input-field"
                            placeholder="student@uinsi.ac.id" value="{{ old('email') }}" required autofocus
                            autocomplete="username">
                        <div class="error-message">
                            <!-- Error message for email will appear here -->
                        </div>
                    </div>

                    <div class="input-group">
                        <label class="input-label" for="password">Password</label>
                        <input type="password" id="password" name="password" class="input-field" placeholder="••••••••"
                            required autocomplete="current-password">
                        <div class="error-message">
                            <!-- Error message for password will appear here -->
                        </div>
                    </div>

                    <div class="remember-forgot">
                        <label class="checkbox-label">
                            <input type="checkbox" id="remember_me" name="remember"> Remember me
                        </label>
                        <a href="{{ route('password.request') }}" class="forgot-link">Forgot Password?</a>
                    </div>

                    <button type="submit" class="login-button">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login
                    </button>
                </form>

                {{-- Bagian OR dan tombol Register ini sebaiknya di luar <form> login --}}
                <div class="divider">
                    <span class="divider-text">OR</span>
                </div>

                {{-- Menggunakan class register-button yang baru --}}
                <a href="{{ route('register') }}" class="register-button">
                    <i class="fas fa-user-plus mr-2"></i> Create Account
                </a>

                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        Contact:<br>
                        <span class="text-primary font-medium">support@uinsi.ac.id</span>
                    </p>
                </div>

                <div class="footer-note">
                    © 2025 UIN Sultan Aji Muhammad Idris Samarinda. All rights reserved.
                </div>
            </div>
        </div>
    </div>
</body>

</html>
