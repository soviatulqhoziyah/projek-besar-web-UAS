<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
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

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
