<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;

class CertificateVerificationController extends Controller
{
    public function show($uuid)
    {
        $pendaftaran = Pendaftaran::where('uuid', $uuid)->where('status', 'SELESAI')->firstOrFail();
        return view('sertifikat.verify', ['pendaftaran' => $pendaftaran]);
    }
}
