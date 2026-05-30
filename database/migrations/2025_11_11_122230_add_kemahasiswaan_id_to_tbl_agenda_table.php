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
            $table->unsignedBigInteger('kemahasiswaan_id')->nullable()->after('id');
            $table->foreign('kemahasiswaan_id')->references('id')->on('tbl_kemahasiswaan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_agenda', function (Blueprint $table) {
            $table->dropForeign(['kemahasiswaan_id']);
            $table->dropColumn('kemahasiswaan_id');
        });
    }
};
