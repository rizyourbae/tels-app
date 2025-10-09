<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Sertifikat TELS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/verify-layout.css') }}">

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

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="verification-card bg-white shadow-xl rounded-xl p-8 max-w-2xl w-full mx-4">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-check-circle text-green-500 text-3xl"></i>
            </div>
            <h1 class="text-2xl font-bold text-primary mb-2">Sertifikat Terverifikasi</h1>
            <p class="text-gray-600">Data berikut ditemukan di database kami.</p>
        </div>

        <div class="space-y-4">
            <div class="info-row flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-user text-primary mr-3"></i>
                    <span class="font-medium text-gray-600">Nama:</span>
                </div>
                <span class="font-bold text-gray-800">{{ $pendaftaran->user->name }}</span>
            </div>

            <div class="info-row flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-id-card text-primary mr-3"></i>
                    <span class="font-medium text-gray-600">NIM:</span>
                </div>
                <span class="font-bold text-gray-800">{{ $pendaftaran->user->nim }}</span>
            </div>

            <div class="info-row flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-star text-yellow-500 mr-3"></i>
                    <span class="font-medium text-gray-600">Skor Total:</span>
                </div>
                <span class="font-bold text-2xl text-primary">{{ $pendaftaran->skor_total }}</span>
            </div>

            <div class="info-row flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-calendar-alt text-blue-500 mr-3"></i>
                    <span class="font-medium text-gray-600">Tanggal Tes:</span>
                </div>
                <span
                    class="font-bold text-gray-800">{{ $pendaftaran->jadwalTes->tanggal_tes->translatedFormat('d F Y') }}</span>
            </div>

            <div class="info-row flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-certificate text-purple-500 mr-3"></i>
                    <span class="font-medium text-gray-600">Nomor Sertifikat:</span>
                </div>
                <span class="font-bold text-gray-800">{{ $pendaftaran->nomor_sertifikat }}</span>
            </div>
        </div>

        <div class="mt-8 text-center">
            <p class="text-sm text-gray-500">Diterbitkan oleh: UPB UINSI Samarinda</p>
        </div>
    </div>
</body>

</html>
