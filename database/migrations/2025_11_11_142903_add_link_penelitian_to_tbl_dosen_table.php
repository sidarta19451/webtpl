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
        Schema::table('tbl_dosen', function (Blueprint $table) {
            $table->json('link_penelitian')->nullable()->after('link_scopus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_dosen', function (Blueprint $table) {
            $table->dropColumn('link_penelitian');
        });
    }
};
