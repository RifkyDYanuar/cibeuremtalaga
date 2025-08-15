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
        Schema::create('idm_desa', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->decimal('skor_idm', 8, 3)->comment('Skor IDM (0-1.000)');
            $table->enum('status_idm', ['Sangat Tertinggal', 'Tertinggal', 'Berkembang', 'Maju', 'Mandiri']);
            
            // Indeks Komponen
            $table->decimal('skor_iks', 8, 3)->comment('Indeks Ketahanan Sosial');
            $table->decimal('skor_ike', 8, 3)->comment('Indeks Ketahanan Ekonomi');
            $table->decimal('skor_ikl', 8, 3)->comment('Indeks Ketahanan Lingkungan');
            
            // Dimensi Detail
            $table->decimal('dimensi_sosial', 8, 3)->nullable();
            $table->decimal('dimensi_ekonomi', 8, 3)->nullable();
            $table->decimal('dimensi_lingkungan', 8, 3)->nullable();
            
            // Target dan Deskripsi
            $table->decimal('target_tahun_depan', 8, 3)->nullable()->comment('Target IDM tahun depan');
            $table->text('deskripsi')->nullable();
            
            // Status publikasi
            $table->boolean('is_published')->default(true);
            
            $table->timestamps();
            
            // Index
            $table->index('tahun');
            $table->index('status_idm');
            $table->index(['tahun', 'is_published']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idm_desa');
    }
};
