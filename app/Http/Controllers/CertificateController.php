<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;
use setasign\Fpdi\Fpdi;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CertificateController extends Controller
{
    public function download(Pendaftaran $pendaftaran)
    {
        if (Auth::id() !== $pendaftaran->user_id && !Auth::user()->hasRole(['Admin', 'Super Admin'])) {
            abort(403, 'Anda tidak berhak mengakses sertifikat ini.');
        }

        $templatePath = storage_path('app/templates/Sertifikat.pdf'); // Pastikan nama file ini sesuai

        $pdf = new Fpdi();
        $pdf->setSourceFile($templatePath);
        $templateId = $pdf->importPage(1);
        $pdf->AddPage('L', 'A4'); // A4 Landscape: 297mm width, 210mm height
        $pdf->useTemplate($templateId);

        // 1. Buat URL Verifikasi (SEBELUM RETURN)
        $verificationUrl = route('sertifikat.verify', ['uuid' => $pendaftaran->uuid]);

        // 2. Generate Gambar QR Code dan simpan sementara
        $qrCodePath = storage_path('app/public/qrcodes/' . $pendaftaran->uuid . '.png');
        if (!file_exists(storage_path('app/public/qrcodes'))) {
            mkdir(storage_path('app/public/qrcodes'), 0755, true);
        }
        QrCode::format('png')->size(80)->generate($verificationUrl, $qrCodePath);

        // 3. Tempelkan QR Code ke PDF menggunakan koordinat
        //    Format: Image(path, X, Y, width)
        $pdf->Image($qrCodePath, 240, 70, 25); // Koordinat X=35, Y=168, Lebar=25mm

        // 4. Hapus file QR code sementara
        unlink($qrCodePath);

        // --- Mulai Mengisi Data dengan Koordinat Baru ---
        $pdf->SetTextColor(0, 0, 0); // Warna hitam

        // Nomor Sertifikat (UPB/B/...)
        $pdf->SetFont('Helvetica', '', 15.5);
        $pdf->SetXY(98, 60); // (X, Y) dalam milimeter
        $pdf->Write(0, $pendaftaran->nomor_sertifikat);

        // Nama Mahasiswa
        $pdf->SetFont('Helvetica', 'B', 14);
        $pdf->SetXY(110, 80);
        $pdf->Write(0, $pendaftaran->user->name);

        //NIM
        $pdf->SetFont('Helvetica', '', 14);
        $pdf->SetXY(110, 88);
        $pdf->Write(0, $pendaftaran->user->nim);

        // Program Studi
        $pdf->SetFont('Helvetica', '', 14);
        $pdf->SetXY(110, 97);
        $pdf->Write(0, $pendaftaran->user->program_studi);

        // Skor Listening
        $pdf->SetFont('Helvetica', 'B', 20);
        $pdf->SetXY(43, 129);
        $pdf->Cell(40, 10, $pendaftaran->skor_listening, 0, 0, 'C'); // Menggunakan Cell() untuk perataan tengah

        // Skor Listening
        $pdf->SetFont('Helvetica', 'B', 20);
        $pdf->SetXY(131, 129);
        $pdf->Cell(40, 10, $pendaftaran->skor_structure, 0, 0, 'C'); // Menggunakan Cell() untuk perataan tengah

        // Skor Reading
        $pdf->SetXY(215, 129);
        $pdf->Cell(40, 10, $pendaftaran->skor_reading, 0, 0, 'C');

        // Skor Total
        $pdf->SetFont('Helvetica', 'B', 14);
        $pdf->SetXY(110, 148.40);
        $pdf->Write(0, $pendaftaran->skor_total);

        // Tanggal Tes (di dalam kalimat)
        $pdf->SetFont('Helvetica', '', 14);
        $pdf->SetXY(110, 157);
        $pdf->Write(0, $pendaftaran->jadwalTes->tanggal_tes->translatedFormat('d F Y'));

        // Tanggal Valid
        $pdf->SetXY(110, 165);
        $pdf->Write(0, $pendaftaran->jadwalTes->tanggal_tes->addYears(2)->translatedFormat('d F Y'));

        // Tanggal Terbit (di kanan)
        $pdf->SetXY(203, 155.50);
        $pdf->Write(0, now()->translatedFormat('d F Y'));

        $fileName = 'sertifikat-tels-' . $pendaftaran->user->name . '.pdf';
        return response($pdf->Output('S', $fileName), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="' . $fileName . '"');
    }
}
