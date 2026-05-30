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
            $table->string('link_kaggle')->nullable();
            $table->string('link_sinta')->nullable();
            $table->string('link_scopus')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_dosen', function (Blueprint $table) {
            $table->dropColumn(['link_kaggle', 'link_sinta', 'link_scopus']);
        });
    }
};
