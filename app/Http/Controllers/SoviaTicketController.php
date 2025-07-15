<?php

namespace App\Http\Controllers;

use App\Models\SoviaPendaftar;
use Illuminate\Http\Request;

class SoviaTicketController extends Controller
{
    public function show($pendaftar_id)
    {
        $pendaftar = SoviaPendaftar::with(['event', 'pembayaran'])->findOrFail($pendaftar_id);

        if (!$pendaftar->pembayaran) {
            return back()->with('error', 'Data pembayaran tidak ditemukan.');
        }
        

        return view('tiket.show', compact('pendaftar'));
    }
}
