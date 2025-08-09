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
        Schema::create('data_kependudukan', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('rt', 3);
            $table->string('rw', 3);
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya']);
            $table->enum('status_perkawinan', ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']);
            $table->string('pekerjaan');
            $table->enum('pendidikan', ['Tidak Sekolah', 'SD/Sederajat', 'SMP/Sederajat', 'SMA/Sederajat', 'Diploma', 'Sarjana', 'Pascasarjana']);
            $table->enum('status_dalam_keluarga', ['Kepala Keluarga', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orangtua', 'Mertua', 'Famili Lain', 'Pembantu', 'Lainnya']);
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->enum('kewarganegaraan', ['WNI', 'WNA'])->default('WNI');
            $table->string('no_kk', 16)->nullable();
            $table->enum('status', ['Aktif', 'Pindah', 'Meninggal'])->default('Aktif');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kependudukan');
    }
};
