<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TELS APP</title>
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
                url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80') center/cover no-repeat;
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

        .register-card {
            width: 100%;
            max-width: 420px;
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

        .register-button {
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

        .register-button:hover {
            background-color: #047857;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(6, 95, 70, 0.2);
        }

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            color: #6B7280;
            font-size: 0.875rem;
        }

        .login-link a {
            color: #065F46;
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

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
            <div class="register-card">
                <h1 class="text-2xl font-bold text-center mb-2" style="color: #065F46;">Create Your Account</h1>
                <p class="text-center text-gray-600 mb-6">Join our academic community today</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="input-group">
                        <label class="input-label" for="name">Full Name</label>
                        <input type="text" id="name" name="name" class="input-field" placeholder="John Doe"
                            value="{{ old('name') }}" required autofocus autocomplete="name">
                        <div class="error-message">
                            <!-- Error message for name will appear here -->
                        </div>
                    </div>

                    <div class="input-group">
                        <label class="input-label" for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="input-field"
                            placeholder="student@uinsamida.ac.id" value="{{ old('email') }}" required
                            autocomplete="username">
                        <div class="error-message">
                            <!-- Error message for email will appear here -->
                        </div>
                    </div>

                    <div class="input-group">
                        <label class="input-label" for="password">Password</label>
                        <input type="password" id="password" name="password" class="input-field" placeholder="••••••••"
                            required autocomplete="new-password">
                        <div class="error-message">
                            <!-- Error message for password will appear here -->
                        </div>
                    </div>

                    <div class="input-group">
                        <label class="input-label" for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="input-field" placeholder="••••••••" required autocomplete="new-password">
                        <div class="error-message">
                            <!-- Error message for password confirmation will appear here -->
                        </div>
                    </div>

                    <button type="submit" class="register-button">
                        <i class="fas fa-user-plus mr-2"></i> Register
                    </button>
                </form>

                <div class="login-link">
                    Already have an account? <a href="{{ route('login') }}">Login</a>
                </div>

                <div class="footer-note">
                    By registering, you agree to our Terms of Service and Privacy Policy
                </div>
            </div>
        </div>
    </div>

    <script>
        // Example of how you might handle Laravel validation errors
        document.addEventListener('DOMContentLoaded', function() {
            // This would be populated by Laravel's validation errors
            const nameError = document.querySelector('#name + .error-message');
            const emailError = document.querySelector('#email + .error-message');
            const passwordError = document.querySelector('#password + .error-message');
            const passwordConfirmationError = document.querySelector('#password_confirmation + .error-message');

            // Example of showing errors
            const errors = {
                name: "{{ $errors->first('name') }}",
                email: "{{ $errors->first('email') }}",
                password: "{{ $errors->first('password') }}",
                password_confirmation: "{{ $errors->first('password_confirmation') }}"
            };

            if (errors.name) {
                nameError.textContent = errors.name;
            }

            if (errors.email) {
                emailError.textContent = errors.email;
            }

            if (errors.password) {
                passwordError.textContent = errors.password;
            }

            if (errors.password_confirmation) {
                passwordConfirmationError.textContent = errors.password_confirmation;
            }
        });
    </script>
</body>

</html>
