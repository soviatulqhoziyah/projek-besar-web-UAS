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

        $beasiswas = SoviaBeasiswa::latest()->paginate(10);
        return view('admin.data_beasiswa', compact('beasiswas'));

        $beasiswas = SoviaBeasiswa::latest()->paginate(6);
        return view('home.beasiswa', compact('beasiswas'));

        $beasiswa = SoviaBeasiswa::findOrFail($id);
        return view('home.beasiswa_detail', compact('beasiswa'));

        
    }
}
