<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoviaPembayaran extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'sovia_pembayarans';

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'pendaftar_id',
        'metode_pembayaran',
        'jumlah',
        'bukti_transfer',
        'status',
        'tanggal_bayar',
    ];

    // Relasi ke model SoviaPendaftar (setiap pembayaran milik satu pendaftar)
    public function pendaftar()
    {
        return $this->belongsTo(SoviaPendaftar::class, 'pendaftar_id');
    }
}
