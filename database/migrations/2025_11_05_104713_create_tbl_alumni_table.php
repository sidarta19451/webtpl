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
        // Membuat tabel tbl_alumni untuk menyimpan data alumni Teknik Perangkat Lunak
        // Tabel ini akan menyimpan informasi dasar alumni, kisah sukses, dan data tracer studi
        Schema::create('tbl_alumni', function (Blueprint $table) {
            $table->id(); // Primary key auto increment
            $table->string('nim', 20)->unique(); // NIM alumni, unik untuk setiap alumni
            $table->string('nama', 100); // Nama lengkap alumni
            $table->string('email')->unique(); // Email alumni, unik
            $table->year('tahun_lulus'); // Tahun kelulusan
            $table->string('jurusan', 50)->default('Teknik Perangkat Lunak'); // Jurusan, default Teknik Perangkat Lunak
            $table->text('kisah_sukses')->nullable(); // Kisah sukses alumni, bisa kosong
            $table->string('status_pekerjaan')->nullable(); // Status pekerjaan saat ini
            $table->string('nama_perusahaan')->nullable(); // Nama perusahaan tempat bekerja
            $table->string('jabatan')->nullable(); // Jabatan di perusahaan
            $table->string('lokasi_kerja')->nullable(); // Lokasi tempat kerja
            $table->decimal('gaji', 10, 2)->nullable(); // Gaji dalam Rupiah, nullable
            $table->string('foto')->nullable(); // Path foto alumni, nullable
            $table->timestamps(); // Created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_alumni');
    }
};
