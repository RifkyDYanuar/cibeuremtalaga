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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->datetime('tanggal_mulai');
            $table->datetime('tanggal_selesai');
            $table->string('lokasi');
            $table->enum('kategori', ['rapat', 'acara', 'kegiatan', 'musyawarah', 'pelatihan', 'lainnya']);
            $table->enum('status', ['aktif', 'selesai', 'dibatalkan'])->default('aktif');
            $table->string('gambar')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
