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
        Schema::table('tbl_penelitian', function (Blueprint $table) {
            $table->dropForeign(['dosen_id']);
            $table->dropForeign(['mahasiswa_id']);
            $table->dropColumn(['dosen_id', 'mahasiswa_id', 'nidn_ketua']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_penelitian', function (Blueprint $table) {
            $table->foreignId('dosen_id')->constrained('tbl_dosen')->onDelete('cascade');
            $table->foreignId('mahasiswa_id')->constrained('tbl_mahasiswa')->onDelete('cascade');
            $table->integer('nidn_ketua')->unique();
        });
    }
};
