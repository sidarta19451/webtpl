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
        Schema::create('tbl_pkm', function (Blueprint $table) {
            $table->id();
            $table->string('judul_pkm');
            $table->string('nama_ketua');
            $table->integer('nidn_ketua')->unique();
            $table->json('anggota')->nullable(); // array of objects with nama and nim
            $table->string('mitra');
            $table->string('lokasi');
            $table->string('sumber_dana');
            $table->bigInteger('biaya');
            $table->text('luaran_wajib');
            $table->string('dokumentasi')->nullable(); // link
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pkm');
    }
};
