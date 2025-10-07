<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sertifikat TELS - {{ $pendaftaran->user->name }}</title>
    <style>
        /* Mendefinisikan font custom dari file lokal */
        @font-face {
            font-family: 'Playfair Display';
            src: url('{{ storage_path('fonts/PlayfairDisplay-Regular.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'Playfair Display';
            src: url('{{ storage_path('fonts/PlayfairDisplay-Bold.ttf') }}') format('truetype');
            font-weight: bold;
            font-style: normal;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url('{{ storage_path('fonts/Montserrat-Regular.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url('{{ storage_path('fonts/Montserrat-SemiBold.ttf') }}') format('truetype');
            font-weight: 600;
            font-style: normal;
        }

        /* CSS lainnya */
        @page {
            margin: 0;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            /* Default font sekarang Montserrat */
            font-size: 14px;
        }

        .page-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .data {
            position: absolute;
        }

        .nomor-sertifikat {
            top: 18.5%;
            left: 35%;
            font-size: 15px;
        }

        .nama-mahasiswa {
            top: 29.8%;
            left: 33.5%;
            font-family: 'Playfair Display', serif;
            /* Menggunakan font Playfair Display */
            font-size: 24px;
        }

        .nim {
            top: 35.2%;
            left: 33.5%;
        }

        .jurusan {
            top: 40.5%;
            left: 33.5%;
        }

        .skor-listening,
        .skor-structure,
        .skor-reading {
            top: 51.5%;
            font-weight: 600;
            font-size: 16px;
            font-family: 'Montserrat', sans-serif;
        }

        .skor-listening {
            left: 23%;
        }

        .skor-structure {
            left: 47%;
        }

        .skor-reading {
            left: 71%;
        }

        .skor-total {
            top: 62.2%;
            left: 22%;
            font-weight: 600;
        }

        .tanggal-tes {
            top: 67.5%;
            left: 22%;
        }

        .valid-until {
            top: 72.8%;
            left: 22%;
        }

        .tanggal-terbit {
            top: 70%;
            left: 68%;
        }

        .pejabat {
            top: 82.2%;
            left: 71.5%;
            text-align: center;
            font-weight: 600;
        }
    </style>
</head>

<body>
    {{-- Memasang gambar template Anda sebagai background --}}
    <img src="{{ public_path('assets/img/sertifikat-bg.jpg') }}" class="page-background">

    {{-- Menempatkan data dinamis di atas background --}}
    <div class="data nomor-sertifikat">TELS-{{ $pendaftaran->id }}-{{ $pendaftaran->created_at->format('Ym') }}</div>
    <div class="data nama-mahasiswa">{{ $pendaftaran->user->name }}</div>
    <div class="data nim">{{ $pendaftaran->user->nim }}</div>
    <div class="data jurusan">{{ $pendaftaran->user->program_studi }}</div>

    <div class="data skor-listening">{{ $pendaftaran->skor_listening }}</div>
    <div class="data skor-structure">{{ $pendaftaran->skor_structure }}</div>
    <div class="data skor-reading">{{ $pendaftaran->skor_reading }}</div>

    <div class="data skor-total">{{ $pendaftaran->skor_total }}</div>
    <div class="data tanggal-tes">{{ $pendaftaran->jadwalTes->tanggal_tes->translatedFormat('l, d F Y') }}</div>
    <div class="data valid-until">{{ $pendaftaran->jadwalTes->tanggal_tes->addYears(2)->translatedFormat('d F Y') }}
    </div>

    <div class="data tanggal-terbit">Samarinda, {{ now()->translatedFormat('d F Y') }}</div>
    <div class="data pejabat">Edy Murdani</div>
</body>

</html>
