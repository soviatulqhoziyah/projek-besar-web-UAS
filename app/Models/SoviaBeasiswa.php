<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SoviaBeasiswa extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_berakhir',
        'poster',
        'link_daftar',
    ];
}
