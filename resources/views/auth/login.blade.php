<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TELS UPB</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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
        body {
            font-family: 'Inter', sans-serif;
            overflow: hidden;
        }

        .split-screen {
            height: 100vh;
            display: flex;
        }

        .left-column {
            width: 50%;
            position: relative;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),
                url('https://images.unsplash.com/photo-1562774053-701939b10b58?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80') center/cover no-repeat;
        }

        .logo-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            z-index: 10;
        }

        .logo {
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            backdrop-filter: blur(5px);
        }

        .logo-text {
            font-size: 1.2rem;
            font-weight: 600;
            line-height: 1.4;
        }

        .right-column {
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(249, 250, 251, 0.9);
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 2.5rem;
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
        }

        .input-group {
            margin-bottom: 1.5rem;
        }

        .input-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #374151;
        }

        .input-field {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #D1D5DB;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .input-field:focus {
            outline: none;
            border-color: #065F46;
            box-shadow: 0 0 0 3px rgba(6, 95, 70, 0.1);
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            font-size: 0.875rem;
        }

        .checkbox-label input {
            margin-right: 0.5rem;
            accent-color: #065F46;
        }

        .forgot-link {
            color: #065F46;
            text-decoration: none;
            font-size: 0.875rem;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .login-button {
            width: 100%;
            padding: 0.75rem;
            background-color: #065F46;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .login-button:hover {
            background-color: #047857;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(6, 95, 70, 0.2);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #E5E7EB;
        }

        .divider-text {
            padding: 0 1rem;
            color: #6B7280;
            font-size: 0.875rem;
        }

        /* --- Tambahan untuk tombol Register --- */
        .register-button {
            width: 100%;
            /* Pastikan lebarnya sama dengan login-button */
            padding: 0.75rem;
            background-color: transparent;
            /* Transparan */
            color: #065F46;
            /* Warna teks sesuai primary */
            border: 1px solid #065F46;
            /* Border warna primary */
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            /* Untuk icon dan teks di tengah */
            align-items: center;
            justify-content: center;
            text-decoration: none;
            /* Hilangkan underline bawaan link */
            margin-top: 1.5rem;
            /* Tambahkan sedikit jarak dari divider */
        }

        .register-button:hover {
            background-color: #F0FDF4;
            /* Latar belakang sedikit berubah saat hover */
            color: #047857;
            border-color: #047857;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(6, 95, 70, 0.1);
        }

        /* --- Akhir Tambahan --- */

        .footer-note {
            text-align: center;
            margin-top: 1.5rem;
            color: #6B7280;
            font-size: 0.75rem;
        }

        .error-message {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .success-message {
            color: #059669;
            background-color: #d1fae5;
            padding: 0.5rem;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
            font-size: 0.875rem;
        }

        @media (max-width: 768px) {
            .split-screen {
                flex-direction: column;
            }

            .left-column {
                width: 100%;
                height: 40vh;
            }

            .right-column {
                width: 100%;
                height: 60vh;
            }
        }
    </style>
</head>

<body>
    <div class="split-screen">
        <!-- Left Column -->
        <div class="left-column">
            <div class="logo-container">
                <div class="logo">
                    <i class="fas fa-university text-white text-4xl"></i>
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
                            placeholder="student@uinsamida.ac.id" value="{{ old('email') }}" required autofocus
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
                        <span class="text-primary font-medium">support@uinsamida.ac.id</span>
                    </p>
                </div>

                <div class="footer-note">
                    © 2025 UIN Sultan Aji Muhammad Idris Samarinda. All rights reserved.
                </div>
            </div>
        </div>
    </div>

    <script>
        // Example of how you might handle Laravel validation errors
        document.addEventListener('DOMContentLoaded', function() {
            // This would be populated by Laravel's validation errors
            const emailError = document.querySelector('#email + .error-message');
            const passwordError = document.querySelector('#password + .error-message');

            // Example of showing success message
            const sessionStatus = "{{ session('status') }}";
            if (sessionStatus) {
                const successDiv = document.querySelector('.success-message');
                successDiv.textContent = sessionStatus;
                successDiv.style.display = 'block';
            }
        });
    </script>
</body>

</html>
