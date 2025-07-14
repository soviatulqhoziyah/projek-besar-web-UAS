<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoviaTicket extends Model
{
    use HasFactory;

    protected $table = 'sovia_tickets';

    protected $fillable = [
        'pendaftar_id',
        'kode_tiket',
        'is_printed',
        'is_checked_in',
    ];

    public function pendaftar()
    {
        return $this->belongsTo(SoviaPendaftar::class, 'pendaftar_id');
    }
}
