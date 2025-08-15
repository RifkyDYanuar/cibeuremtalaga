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
        Schema::table('bpd_activities', function (Blueprint $table) {
            // Hapus field yang tidak digunakan
            $table->dropColumn(['gallery', 'is_published', 'sort_order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bpd_activities', function (Blueprint $table) {
            // Kembalikan field yang dihapus
            $table->json('gallery')->nullable();
            $table->boolean('is_published')->default(true);
            $table->integer('sort_order')->default(0);
        });
    }
};
