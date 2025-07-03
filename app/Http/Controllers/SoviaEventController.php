<?php

namespace App\Http\Controllers;

use App\Models\SoviaEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SoviaEventController extends Controller
{
    /**
     * Tampilkan daftar semua event dengan pagination (untuk halaman utama atau admin).
     */
    public function index()
    {
        $events = SoviaEvent::orderBy('tanggal_kegiatan')->paginate(6);
        return view('home.homepage', compact('events'));
    }

    /**
     * Tampilkan detail satu event (untuk pengunjung/public).
     */
    public function show($id)
    {
        $event = SoviaEvent::findOrFail($id);
        return view('home.detail', compact('event'));
    }

    /**
     * Form untuk membuat event baru.
     */
    public function create()
    {
        return view('admin.tambah');
    }

    /**
     * Simpan event baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image'               => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nama_kegiatan'       => 'required|string|max:255',
            'deskripsi'           => 'nullable|string',
            'tanggal_kegiatan'    => 'required|date',
            'waktu'               => 'required',
            'tempat'              => 'required|string|max:255',
            'tanggal_pendaftaran' => 'required|date',
            'insert'              => 'nullable|string|max:255',
            'contact_person'      => 'required|string|max:255',
            'benefitnya'          => 'nullable|string',
        ]);

        // Simpan image ke storage
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('event_images', 'public');
        }

        SoviaEvent::create($validated);

        return redirect()->route('admin.data_events')
                 ->with('success', 'Event berhasil ditambahkan.');
    }

    /**
     * Form untuk edit event.
     */
    public function edit($id)
    {
        $event = SoviaEvent::findOrFail($id);
        return view('admin.edit', compact('event'));
    }

    /**
     * Simpan update data event.
     */
    public function update(Request $request, $id)
    {
        $event = SoviaEvent::findOrFail($id);

        $validated = $request->validate([
            'image'               => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nama_kegiatan'       => 'required|string|max:255',
            'deskripsi'           => 'nullable|string',
            'tanggal_kegiatan'    => 'required|date',
            'waktu'               => 'required',
            'tempat'              => 'required|string|max:255',
            'tanggal_pendaftaran' => 'required|date',
            'insert'              => 'nullable|string|max:255',
            'contact_person'      => 'required|string|max:255',
            'benefitnya'          => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($event->image && Storage::disk('public')->exists($event->image)) {
                Storage::disk('public')->delete($event->image);
            }

            $validated['image'] = $request->file('image')->store('event_images', 'public');
        }

        $event->update($validated);

        return redirect()->route('admin.data_events')->with('success', 'Event berhasil diperbarui.');
    }

    /**
     * Hapus event.
     */
    public function destroy($id)
    {
        $event = SoviaEvent::findOrFail($id);

        if ($event->image && Storage::disk('public')->exists($event->image)) {
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();

        return redirect()->route('admin.data_events')
                 ->with('success', 'Event berhasil dihapus.');
    }
}
