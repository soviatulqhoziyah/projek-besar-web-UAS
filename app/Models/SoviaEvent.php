<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoviaEvent extends Model
{
    use HasFactory;

    protected $table = 'sovia_events';

    protected $fillable = [
        'image',
        'nama_kegiatan',
        'deskripsi',
        'tanggal_kegiatan',
        'waktu',
        'tempat',
        'tanggal_pendaftaran',
        'insert',
        'contact_person',
        'benefitnya',
    ];

    public function homepage()
{
    $events = SoviaEvent::latest()->get(); // atau ->paginate(6) jika pakai pagination
    return view('home.index', compact('events')); // pastikan blade sesuai
}


}


