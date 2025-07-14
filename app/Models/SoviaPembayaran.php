<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoviaPembayaran extends Model
{
    use HasFactory;

    protected $table = 'sovia_pembayarans';

    protected $fillable = [
        'pendaftar_id',
        'metode_pembayaran',
        'jumlah',
        'bukti_transfer',
        'status',
        'tanggal_bayar',
    ];

    public function pendaftar()
    {
        return $this->belongsTo(SoviaPendaftar::class, 'pendaftar_id');
    }
}
