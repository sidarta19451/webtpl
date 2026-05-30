<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_penelitian', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->foreignId('dosen_id')->constrained('tbl_dosen')->onDelete('cascade');
            $table->foreignId('mahasiswa_id')->constrained('tbl_mahasiswa')->onDelete('cascade');
            $table->string('nama_ketua');
            $table->integer('nidn_ketua')->unique();
            $table->string('nama_anggota')->nullable();
            $table->string('sumber_dana');
            $table->bigInteger('biaya');
            $table->integer('jangka_waktu');
            $table->text('luaran_utama');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        Schema::table('tbl_penelitian', function (Blueprint $table) {
            $table->dropColumn('nama_anggota');
            $table->json('nama_anggota')->nullable()->default(null)->after('nidn_ketua'); // JSON field for multiple members
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_penelitian');
    }
};
