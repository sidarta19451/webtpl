<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan model ini
    protected $table = 'tbl_alumni';

    // Field yang dapat diisi massal (mass assignable)
    protected $fillable = [
        'nim',           // NIM alumni
        'nama',          // Nama lengkap alumni
        'email',         // Email alumni
        'tahun_lulus',   // Tahun kelulusan
        'jurusan',       // Jurusan (default Teknik Perangkat Lunak)
        'kisah_sukses',  // Kisah sukses alumni
        'status_pekerjaan', // Status pekerjaan saat ini
        'nama_perusahaan',  // Nama perusahaan
        'jabatan',       // Jabatan di perusahaan
        'lokasi_kerja',  // Lokasi kerja
        'gaji',          // Gaji dalam Rupiah
        'foto'           // Path foto alumni
    ];

    // Field yang harus di-cast ke tipe data tertentu
    protected $casts = [
        'tahun_lulus' => 'integer', // Cast tahun_lulus ke integer
        'gaji' => 'decimal:2'       // Cast gaji ke decimal dengan 2 digit desimal
    ];

    /**
     * Scope untuk mencari alumni berdasarkan jurusan Teknik Perangkat Lunak
     * Method ini digunakan untuk memfilter data alumni yang berasal dari jurusan tertentu
     */
    public function scopeTeknikPerangkatLunak($query)
    {
        return $query->where('jurusan', 'Teknik Perangkat Lunak');
    }

    /**
     * Scope untuk mencari alumni yang sudah bekerja
     * Method ini berguna untuk tracer studi - melihat alumni yang sudah memiliki pekerjaan
     */
    public function scopeSudahBekerja($query)
    {
        return $query->whereNotNull('status_pekerjaan');
    }

    /**
     * Scope untuk mencari alumni berdasarkan tahun lulus
     * Berguna untuk analisis data alumni per angkatan
     */
    public function scopeTahunLulus($query, $tahun)
    {
        return $query->where('tahun_lulus', $tahun);
    }

    /**
     * Relasi dengan model Mahasiswa
     * Alumni berasal dari data mahasiswa yang sudah lulus
     */
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    /**
     * Accessor untuk mendapatkan format nama lengkap: nama - nim - (jurusan)
     * Method ini mengembalikan string dengan format yang diminta
     */
    public function getNamaLengkapAttribute()
    {
        return $this->nama . ' - ' . $this->nim . ' - (' . $this->jurusan . ')';
    }
}
