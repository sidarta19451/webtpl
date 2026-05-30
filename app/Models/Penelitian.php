<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    use HasFactory;

    protected $table = 'tbl_penelitian';

    protected $fillable = [
        'judul',
        'nama_ketua', // berisi nidn atau nim
        'nama_anggota', // json array of nidn atau nim
        'sumber_dana',
        'biaya',
        'jangka_waktu',
        'luaran_utama'
    ];

    protected $casts = [
        'nama_anggota' => 'array',
    ];



    public function getNamaKetuaFormattedAttribute()
    {
        // nama_ketua berisi nidn atau nim
        $dosen = Dosen::where('nidn', $this->nama_ketua)->first();
        if ($dosen) {
            return $dosen->nama . ' - ' . $dosen->nidn . ' - (' . $dosen->jabatan . ')';
        }
        $mahasiswa = Mahasiswa::where('nim', $this->nama_ketua)->first();
        if ($mahasiswa) {
            return $mahasiswa->nama . ' - ' . $mahasiswa->nim . ' - (Mahasiswa)';
        }
        return $this->nama_ketua;
    }

    public function getAnggotaFormattedAttribute()
    {
        $anggota = [];
        $nama_anggota = $this->nama_anggota;
        if (is_string($nama_anggota)) {
            $nama_anggota = json_decode($nama_anggota, true);
        }
        if (is_array($nama_anggota)) {
            foreach ($nama_anggota as $nidn_nim) {
                $dosen = Dosen::where('nidn', $nidn_nim)->first();
                if ($dosen) {
                    $anggota[] = $dosen->nama . ' - ' . $dosen->nidn . ' - (' . $dosen->jabatan . ')';
                } else {
                    $mahasiswa = Mahasiswa::where('nim', $nidn_nim)->first();
                    if ($mahasiswa) {
                        $anggota[] = $mahasiswa->nama . ' - ' . $mahasiswa->nim . ' - (Mahasiswa)';
                    } else {
                        $anggota[] = $nidn_nim;
                    }
                }
            }
        }
        return $anggota;
    }
}
