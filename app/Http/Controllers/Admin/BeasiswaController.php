<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SoviaBeasiswa;
use Illuminate\Support\Facades\Storage;

class BeasiswaController extends Controller
{
    public function index()
    {
        $beasiswas = SoviaBeasiswa::latest()->paginate(10);
        return view('admin.data_beasiswa', compact('beasiswas'));
    }

    public function create()
    {
        return view('admin.beasiswa_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link_daftar' => 'nullable|url',
        ]);

        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }

        SoviaBeasiswa::create($validated);

        return redirect()->route('beasiswa.index')->with('success', 'Beasiswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $beasiswa = SoviaBeasiswa::findOrFail($id);
        return view('admin.beasiswa_edit', compact('beasiswa'));
    }

    public function update(Request $request, $id)
    {
        $beasiswa = SoviaBeasiswa::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link_daftar' => 'nullable|url',
        ]);

        if ($request->hasFile('poster')) {
            if ($beasiswa->poster && Storage::disk('public')->exists($beasiswa->poster)) {
                Storage::disk('public')->delete($beasiswa->poster);
            }
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $beasiswa->update($validated);

        return redirect()->route('admin.beasiswa.index')->with('success', 'Beasiswa berhasil ditambahkan!');

    }

    public function destroy($id)
    {
        $beasiswa = SoviaBeasiswa::findOrFail($id);

        if ($beasiswa->poster && Storage::disk('public')->exists($beasiswa->poster)) {
            Storage::disk('public')->delete($beasiswa->poster);
        }

        $beasiswa->delete();

        return redirect()->route('beasiswa.index')->with('success', 'Beasiswa berhasil dihapus!');
    }
}
