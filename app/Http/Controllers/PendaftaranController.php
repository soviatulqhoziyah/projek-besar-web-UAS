<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\SoviaPendaftar;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /* ========== TAMPILKAN FORM ========== */
    public function form($id)
    {
        // 404 otomatis kalau id tidak ketemu
        $event = Event::findOrFail($id);

        return view('pendaftaran.form', compact('event'));
    }

    /* ========== SIMPAN DATA ============= */
    public function submit(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'no_hp'        => 'required|string|max:20',
            'instansi'     => 'nullable|string|max:255',
        ]);

        SoviaPendaftar::create([
            'event_id'           => $event->id,
            'nama_lengkap'       => $request->nama_lengkap,
            'email'              => $request->email,
            'no_hp'              => $request->no_hp,
            'instansi'           => $request->instansi,
            'status_pendaftaran' => 'pending',
            'status_pembayaran'  => 'belum',
        ]);

        return back()->with('success', 'Pendaftaran berhasil dikirim!');
    }
}
