<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoviaEvent; // atau Event sesuai model yang kamu pakai

class AdminController extends Controller
{
    public function data()
    {
        // Ambil data event dan kirim ke view
        $events = SoviaEvent::paginate(10);
        return view('admin.data_events', compact('events'));
    }
}
