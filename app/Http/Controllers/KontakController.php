<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KontakDanPesan;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = KontakDanPesan::paginate(10);
        return view('home.kontak', compact('kontak'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'pesan' => 'required'
    ]);

    KontakDanPesan::create($request->all());

    return redirect()->route('home.kontak')->with('success', 'Pesan berhasil dikirim!');
}
}
