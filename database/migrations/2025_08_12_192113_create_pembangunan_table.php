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
        Schema::create('pembangunan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_proyek');
            $table->text('deskripsi');
            $table->enum('kategori', ['infrastruktur', 'pendidikan', 'kesehatan', 'ekonomi', 'sosial', 'lingkungan', 'lainnya']);
            $table->enum('status', ['perencanaan', 'proses', 'selesai', 'ditunda'])->default('perencanaan');
            $table->decimal('anggaran', 15, 2);
            $table->decimal('realisasi', 15, 2)->default(0);
            $table->string('sumber_dana');
            $table->string('lokasi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai')->nullable();
            $table->date('tanggal_target');
            $table->integer('progress')->default(0); // percentage 0-100
            $table->string('penanggung_jawab');
            $table->string('kontraktor')->nullable();
            $table->json('gambar')->nullable(); // untuk multiple images
            $table->text('keterangan')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembangunan');
    }
};
