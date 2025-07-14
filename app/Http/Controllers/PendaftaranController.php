<?php
use App\Models\Event;
use App\Models\SoviaTicket;
use Illuminate\Http\Request;
use App\Models\SoviaPendaftar;
use App\Models\SoviaPembayaran;
use Illuminate\Routing\Controller;


class PendaftaranController extends Controller
{
    public function form(Event $event)
    {
        return view('pendaftaran.form', compact('event'));
    }

    public function submit(Request $request, Event $event)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'email' => 'required|email',
            'no_hp' => 'required|string',
            'instansi' => 'nullable|string',
            'metode_pembayaran' => 'required|string',
            'jumlah' => 'nullable|integer',
            'bukti_transfer' => 'nullable|image|max:2048',
        ]);

        // Buat pendaftar
        $pendaftar = SoviaPendaftar::create([
            'event_id' => $event->id,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'instansi' => $request->instansi,
            'status_pembayaran' => $request->hasFile('bukti_transfer') ? 'cicil' : 'belum',
        ]);

        // Jika ada bukti transfer, simpan ke tabel pembayaran
        if ($request->hasFile('bukti_transfer')) {
            $bukti = $request->file('bukti_transfer')->store('bukti_pembayaran', 'public');

            SoviaPembayaran::create([
                'pendaftar_id' => $pendaftar->id,
                'metode_pembayaran' => $request->metode_pembayaran,
                'jumlah' => $request->jumlah,
                'bukti_transfer' => $bukti,
                'status' => 'menunggu',
                'tanggal_bayar' => now(),
            ]);
        }

        return redirect()->route('daftar.form', $event->id)
            ->with('success', 'Pendaftaran berhasil! Bukti pembayaran akan diverifikasi oleh panitia.');
    }
}
