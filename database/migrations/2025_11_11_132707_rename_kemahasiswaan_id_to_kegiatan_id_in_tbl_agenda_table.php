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
            $table->dropForeign(['kemahasiswaan_id']);
            $table->renameColumn('kemahasiswaan_id', 'kegiatan_id');
            $table->foreign('kegiatan_id')->references('id')->on('tbl_kegiatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_agenda', function (Blueprint $table) {
            $table->dropForeign(['kegiatan_id']);
            $table->renameColumn('kegiatan_id', 'kemahasiswaan_id');
            $table->foreign('kemahasiswaan_id')->references('id')->on('tbl_kemahasiswaan')->onDelete('cascade');
        });
    }
};
