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
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('gambar');
            $table->enum('kategori', ['kegiatan', 'pembangunan', 'acara', 'fasilitas', 'lingkungan', 'lainnya'])->default('kegiatan');
            $table->date('tanggal_foto')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('fotografer')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('urutan')->default(0);
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
            
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->index(['kategori', 'status']);
            $table->index(['is_featured', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};
