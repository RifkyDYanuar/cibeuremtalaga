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
        Schema::create('bpd_content', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // visi, misi, profil, contact_info, etc
            $table->text('title')->nullable();
            $table->longText('content');
            $table->string('type')->default('text'); // text, json, html
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bpd_content');
    }
};
