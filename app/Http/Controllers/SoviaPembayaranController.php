<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoviaPembayaran;
use App\Models\SoviaPendaftar;
use Illuminate\Support\Facades\Storage;

class SoviaPembayaranController extends Controller
{
    public function create($pendaftar_id)
    {
        $pendaftar = SoviaPendaftar::with('event')->findOrFail($pendaftar_id);
        return view('pendaftaran.pembayaran', compact('pendaftar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pendaftar_id' => 'required|exists:sovia_pendaftars,id',
            'metode_pembayaran' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'bukti_transfer' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['pendaftar_id', 'metode_pembayaran', 'jumlah']);

        // Upload bukti jika ada
        if ($request->hasFile('bukti_transfer')) {
            $data['bukti_transfer'] = $request->file('bukti_transfer')->store('bukti', 'public');
        }

        $data['status'] = 'menunggu';
        $data['tanggal_bayar'] = now();

        SoviaPembayaran::create($data);

        return redirect()->route('ticket.create', ['pendaftar_id' => $request->pendaftar_id]);

    }
}
