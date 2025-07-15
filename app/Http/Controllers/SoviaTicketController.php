<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoviaTicket;

class SoviaTicketController extends Controller
{
    public function create()
    {
        return view('pendaftaran.ticket');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pendaftar_id' => 'required|exists:sovia_pendaftars,id',
            'kode_tiket' => 'required|string|max:255',
            'is_printed' => 'required|boolean',
            'is_checked_in' => 'required|boolean',
        ]);

        SoviaTicket::create($request->all());

        return redirect()->back()->with('success', 'Tiket berhasil disimpan.');
    }
}
