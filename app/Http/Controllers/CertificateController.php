<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function download(Pendaftaran $pendaftaran)
    {
        // Keamanan: Pastikan hanya pemilik sertifikat atau admin yang bisa download
        if (Auth::id() !== $pendaftaran->user_id && !Auth::user()->hasRole(['Admin', 'Super Admin'])) {
            abort(403, 'Anda tidak berhak mengakses sertifikat ini.');
        }

        // Generate PDF
        $pdf = Pdf::loadView('sertifikat.template', ['pendaftaran' => $pendaftaran]);
        $pdf->setPaper('a4', 'landscape'); // Atur ukuran kertas menjadi A4 Landscape

        // Tawarkan file untuk di-download
        return $pdf->download('sertifikat-tels-' . $pendaftaran->user->name . '.pdf');
    }
}
