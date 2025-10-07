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
        if (Auth::id() !== $pendaftaran->user_id && !Auth::user()->hasRole(['Admin', 'Super Admin'])) {
            abort(403, 'Anda tidak berhak mengakses sertifikat ini.');
        }

        $pdf = Pdf::loadView('sertifikat.template', ['pendaftaran' => $pendaftaran]);

        // Pastikan ukuran kertas A4 landscape
        $pdf->setPaper('a4', 'landscape');

        return $pdf->download('sertifikat-tels-' . $pendaftaran->user->name . '.pdf');
    }
}
