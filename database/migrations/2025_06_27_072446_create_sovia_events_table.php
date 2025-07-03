<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sovia_events', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('nama_kegiatan');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_kegiatan');
            $table->time('waktu');
            $table->string('tempat');
            $table->date('tanggal_pendaftaran');
            $table->string('insert')->nullable();          // nama admin/penginput
            $table->string('contact_person');
            $table->text('benefitnya')->nullable();
            $table->timestamps();                          // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sovia_events');
    }
};
