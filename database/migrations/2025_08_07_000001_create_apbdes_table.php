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
        Schema::create('apbdes', function (Blueprint $table) {
            $table->id();
            $table->year('tahun_anggaran');
            $table->enum('jenis', ['pendapatan', 'belanja']);
            $table->string('kategori');
            $table->text('uraian');
            $table->decimal('jumlah', 15, 2);
            $table->text('keterangan')->nullable();
            $table->enum('status', ['draft', 'aktif', 'revisi'])->default('draft');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            
            $table->index(['tahun_anggaran', 'jenis']);
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apbdes');
    }
};
