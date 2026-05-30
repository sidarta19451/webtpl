<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pkm extends Model
{
    use HasFactory;

    protected $table = 'tbl_pkm';

    protected $fillable = ['judul_pkm', 'nama_ketua', 'anggota', 'mitra', 'lokasi', 'sumber_dana', 'biaya', 'luaran_wajib', 'dokumentasi'];

    protected $casts = [
        'anggota' => 'array',
    ];

    public function ketua()
    {
        return $this->belongsTo(Dosen::class, 'nidn_ketua', 'nidn');
    }

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
        $nama_anggota = $this->anggota;
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

    public function getAnggotaMahasiswaAttribute()
    {
        if ($this->anggota) {
            $anggota = [];
            foreach ($this->anggota as $member) {
                if (isset($member['nim'])) {
                    $mahasiswa = Mahasiswa::where('nim', $member['nim'])->first();
                    if ($mahasiswa) {
                        $anggota[] = [
                            'nim' => $mahasiswa->nim,
                            'nama' => $mahasiswa->nama,
                        ];
                    }
                }
            }
            return $anggota;
        }
        return [];
    }
}
