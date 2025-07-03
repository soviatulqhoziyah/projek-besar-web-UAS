<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakDanPesan extends Model
{
    use HasFactory;

    protected $table = 'kontak_dan_pesan'; // sesuai nama tabel di database

    // Jika kamu hanya ingin pakai ::all(), ini saja sudah cukup.
    // Tambahan opsional:
    protected $fillable = ['nama', 'email', 'subject', 'pesan'];
}
