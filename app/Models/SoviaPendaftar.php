<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoviaPendaftar extends Model
{
    use HasFactory;

    protected $table = 'sovia_pendaftars';

    protected $fillable = [
        'event_id',
        'nama_lengkap',
        'email',
        'no_hp',
        'instansi',
        'status_pendaftaran',
        'status_pembayaran',
    ];

    // public function event()
    // {
    //     return $this->belongsTo(Event::class);
    // }

    public function pembayarans()
    {
        return $this->hasMany(SoviaPembayaran::class, 'pendaftar_id');
    }

    public function ticket()
    {
        return $this->hasOne(SoviaTicket::class, 'pendaftar_id');
    }

    public function event()
{
    return $this->belongsTo(Event::class, 'event_id');
}
}

