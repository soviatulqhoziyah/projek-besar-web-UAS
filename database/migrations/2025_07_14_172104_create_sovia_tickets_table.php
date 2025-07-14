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
        Schema::create('sovia_tickets', function (Blueprint $table) {

            $table->id();
            $table->foreignId('pendaftar_id')->constrained()->onDelete('cascade');
            $table->string('kode_tiket')->unique(); // bisa QRCode atau ID unik
            $table->boolean('is_printed')->default(false); // sudah dicetak atau belum
            $table->boolean('is_checked_in')->default(false); // dicek saat registrasi fisik
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sovia_tickets');
    }
};
