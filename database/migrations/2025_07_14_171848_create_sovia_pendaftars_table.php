<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sovia_pendaftars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('no_hp');
            $table->string('instansi')->nullable();
            $table->enum('status_pendaftaran', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->enum('status_pembayaran', ['belum', 'cicil', 'lunas'])->default('belum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sovia_pendaftars');
    }
};
