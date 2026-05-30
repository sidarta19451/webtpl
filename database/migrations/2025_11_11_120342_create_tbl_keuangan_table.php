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
        Schema::create('tbl_keuangan', function (Blueprint $table) {
            $table->id();
            $table->string('sub_kategori'); // biaya kuliah, beasiswa, denda keterlambatan
            $table->text('judul');
            $table->text('deskripsi')->nullable();
            $table->string('file_path')->nullable(); // untuk upload file
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_keuangan');
    }
};
