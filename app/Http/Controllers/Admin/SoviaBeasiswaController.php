<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SoviaBeasiswa;
use Illuminate\Support\Facades\Storage;

class SoviaBeasiswaController extends Controller
{
    public function index()
    {
        $data = SoviaBeasiswa::latest()->get();
        return view('admin.beasiswa.index', compact('data'));
    }

    public function create()
    {
        return view('admin.beasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date',
            'poster' => 'nullable|image',
            'link_daftar' => 'nullable|url'
        ]);

        $file = null;
        if ($request->hasFile('poster')) {
            $file = $request->file('poster')->store('posters', 'public');
        }

        SoviaBeasiswa::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'poster' => $file,
            'link_daftar' => $request->link_daftar,
        ]);

        return redirect()->route('data_beasiswa.index')->with('success', 'Data beasiswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $beasiswa = SoviaBeasiswa::findOrFail($id);
        return view('admin.beasiswa.edit', compact('beasiswa'));
    }

    public function update(Request $request, $id)
    {
        $beasiswa = SoviaBeasiswa::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date',
            'poster' => 'nullable|image',
            'link_daftar' => 'nullable|url'
        ]);

        if ($request->hasFile('poster')) {
            if ($beasiswa->poster) {
                Storage::disk('public')->delete($beasiswa->poster);
            }
            $beasiswa->poster = $request->file('poster')->store('posters', 'public');
        }

        $beasiswa->update($request->except('poster'));

        return redirect()->route('data_beasiswa.index')->with('success', 'Data beasiswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $beasiswa = SoviaBeasiswa::findOrFail($id);
        if ($beasiswa->poster) {
            Storage::disk('public')->delete($beasiswa->poster);
        }
        $beasiswa->delete();

        return redirect()->route('data_beasiswa.index')->with('success', 'Data beasiswa berhasil dihapus!');
    }
}
