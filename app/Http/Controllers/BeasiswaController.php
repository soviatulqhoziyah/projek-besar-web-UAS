<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoviaBeasiswa;

class BeasiswaController extends Controller
{
    public function index()
    {
        $beasiswas = SoviaBeasiswa::latest()->paginate(6);
        return view('home.beasiswa', compact('beasiswas'));
    }

    public function show($id)
    {
        $beasiswa = SoviaBeasiswa::findOrFail($id);
        return view('home.beasiswa_detail', compact('beasiswa'));
    }

}
