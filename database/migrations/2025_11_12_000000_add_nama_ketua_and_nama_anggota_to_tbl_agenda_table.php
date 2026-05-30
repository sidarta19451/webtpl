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
        Schema::table('tbl_agenda', function (Blueprint $table) {
            $table->string('nama_ketua')->nullable()->after('foto');
            $table->json('nama_anggota')->nullable()->after('nama_ketua');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_agenda', function (Blueprint $table) {
            $table->dropColumn(['nama_ketua', 'nama_anggota']);
        });
    }
};
