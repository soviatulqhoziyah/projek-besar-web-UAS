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
        Schema::create('sovia_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftar_id')->constrained()->onDelete('cascade');
            $table->string('metode_pembayaran');
            $table->integer('jumlah');
            $table->string('bukti_transfer')->nullable(); // path image
            $table->enum('status', ['menunggu', 'valid', 'tidak_valid'])->default('menunggu');
            $table->timestamp('tanggal_bayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sovia_pembayarans');
    }
};
