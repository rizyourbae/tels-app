<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden - Akses Ditolak</title>
    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'university-green': '#065F46',
                        'university-green-light': '#0D9488',
                        'university-green-dark': '#044F39'
                    },
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full text-center">
        <!-- Main Icon -->
        <div class="mb-8 flex justify-center">
            <div class="w-24 h-24 bg-university-green/10 rounded-full flex items-center justify-center">
                <i class="fas fa-shield-alt text-university-green text-5xl"></i>
            </div>
        </div>

        <!-- Error Code -->
        <h1 class="text-6xl font-bold text-university-green mb-4">403</h1>

        <!-- Main Heading -->
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Akses Ditolak</h2>

        <!-- Explanation Paragraph -->
        <p class="text-gray-600 mb-8 leading-relaxed">
            Maaf, Anda tidak memiliki hak akses untuk mengunjungi halaman ini. Kemungkinan Anda mencoba mengakses
            halaman mahasiswa dengan akun admin, atau sebaliknya.
        </p>

        <!-- Call to Action Button -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="inline-block bg-green-700 hover:bg-green-800 text-white font-semibold py-3 px-8 rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md cursor-pointer">
                Kembali ke Halaman Login
            </button>
        </form>

        <!-- University Branding -->
        <div class="mt-12 pt-6 border-t border-gray-200">
            <p class="text-sm text-gray-500">Sistem Portal Universitas</p>
        </div>
    </div>
</body>

</html>
