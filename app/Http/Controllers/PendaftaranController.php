<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\SoviaPendaftar;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Tampilkan form pendaftaran berdasarkan ID event
     */
    public function form($id)
    {
        // Cari event berdasarkan ID, kalau tidak ketemu akan 404
        $event = Event::findOrFail($id);

        // Kirim data event ke view pendaftaran
        return view('pendaftaran.form', compact('event'));
    }

    /**
     * Proses submit pendaftaran dan redirect ke form pembayaran
     */
    public function submit(Request $request, $id)
    {
        // Cari event berdasarkan ID
        $event = Event::findOrFail($id);

        // Validasi input dari user
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'no_hp'        => 'required|string|max:20',
            'instansi'     => 'nullable|string|max:255',
        ]);

        // Simpan data pendaftar ke database
        $pendaftar = SoviaPendaftar::create([
            'event_id'           => $event->id,
            'nama_lengkap'       => $request->nama_lengkap,
            'email'              => $request->email,
            'no_hp'              => $request->no_hp,
            'instansi'           => $request->instansi,
            'status_pendaftaran' => 'pending',
            'status_pembayaran'  => 'belum',
        ]);

        // Redirect ke form pembayaran dengan pendaftar_id
        return redirect()->route('pembayaran.create', ['pendaftar_id' => $pendaftar->id]);
    }

    
}
