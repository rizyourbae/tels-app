<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sertifikat TELS - {{ $pendaftaran->user->name }}</title>
    <style>
        /* [PENTING] Kita letakkan semua CSS di sini agar dibaca oleh dompdf */
        @page {
            margin: 0.4in;
            /* Memberi margin pada halaman PDF */
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Helvetica', 'sans-serif';
            /* Menggunakan font dasar PDF */
            background: #ffffff;
            color: #333333;
        }

        .certificate-border {
            border: 4px solid #065F46;
            padding: 0.3in;
            height: 90%;
            /* Mengisi tinggi tersedia setelah margin */
        }

        .university-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .university-name {
            font-size: 20px;
            font-weight: bold;
            color: #065F46;
            line-height: 1.3;
            margin: 0;
        }

        .certificate-title {
            font-family: 'Times New Roman', serif;
            font-size: 36px;
            font-weight: bold;
            color: #065F46;
            text-align: center;
            margin: 15px 0;
        }

        .presentation-text {
            font-size: 16px;
            text-align: center;
            margin-bottom: 10px;
            color: #555555;
        }

        .student-name {
            font-family: 'Times New Roman', serif;
            font-size: 28px;
            text-align: center;
            margin-bottom: 15px;
            color: #065F46;
            font-style: italic;
        }

        .student-nim {
            font-size: 15px;
            text-align: center;
            margin-bottom: 20px;
            color: #555555;
        }

        .completion-text {
            font-size: 14px;
            text-align: center;
            margin-bottom: 20px;
            line-height: 1.5;
            color: #555555;
        }

        .scores-table {
            width: 70%;
            margin: 0 auto 15px auto;
            border-collapse: collapse;
        }

        .scores-table td {
            padding: 8px 15px;
            text-align: center;
            font-size: 14px;
            border: 1px solid #dddddd;
        }

        .scores-table td:first-child {
            text-align: left;
            font-weight: normal;
        }

        .total-score {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 25px;
            color: #065F46;
        }

        .signature-section {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .signature-section td {
            width: 50%;
            vertical-align: top;
            text-align: center;
            padding: 0 20px;
        }

        .signature-line {
            width: 200px;
            height: 1px;
            background: #333333;
            margin: 40px auto 10px auto;
        }

        .signature-title {
            font-size: 12px;
            font-weight: bold;
            color: #065F46;
            margin-bottom: 2px;
        }

        .signature-name {
            font-size: 14px;
            font-weight: normal;
            margin-bottom: 20px;
        }

        .certificate-footer {
            text-align: center;
            margin-top: 15px;
            font-size: 11px;
            color: #666666;
        }

        .certificate-id {
            font-weight: bold;
            color: #065F46;
        }
    </style>
</head>

<body>
    <div class="certificate-border">
        <div class="university-header">
            <h1 class="university-name">UIN SULTAN AJI MUHAMMAD IDRIS SAMARINDA</h1>
        </div>

        <h2 class="certificate-title">CERTIFICATE OF COMPLETION</h2>

        <p class="presentation-text">This certificate is proudly presented to</p>
        <p class="student-name">{{ $pendaftaran->user->name }}</p>
        <p class="student-nim">NIM: {{ $pendaftaran->user->nim }}</p>

        <p class="completion-text">
            For having successfully completed the TELS (Test of English Language Skills) on
            {{ $pendaftaran->jadwalTes->tanggal_tes->translatedFormat('F d, Y') }}.
        </p>

        <table class="scores-table">
            <tr>
                <td>Listening Comprehension</td>
                <td>{{ $pendaftaran->skor_listening }}</td>
            </tr>
            <tr>
                <td>Structure & Written Expression</td>
                <td>{{ $pendaftaran->skor_structure }}</td>
            </tr>
            <tr>
                <td>Reading Comprehension</td>
                <td>{{ $pendaftaran->skor_reading }}</td>
            </tr>
        </table>

        <div class="total-score">Total Score: <strong>{{ $pendaftaran->skor_total }}</strong></div>

        <table class="signature-section">
            <tr>
                <td>
                    <div class="signature-line"></div>
                    <div class="signature-title">Head of Language Center</div>
                    <div class="signature-name">(Nama Kepala UPT Bahasa)</div>
                </td>
                <td>
                    <div class="signature-line"></div>
                    <div class="signature-title">Rector</div>
                    <div class="signature-name">(Nama Rektor)</div>
                </td>
            </tr>
        </table>

        <div class="certificate-footer">
            Issued on: {{ now()->translatedFormat('F d, Y') }} | Certificate ID:
            <span
                class="certificate-id">TELS-{{ $pendaftaran->id }}-{{ $pendaftaran->created_at->format('Ym') }}</span>
        </div>
    </div>
</body>

</html>
