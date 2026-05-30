<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'tbl_dosen';

    protected $fillable = ['nidn', 'nama', 'email', 'jurusan', 'jabatan', 'foto', 'link_google_scholar', 'link_sinta', 'link_scopus', 'link_penelitian'];

    protected $casts = [
        'link_penelitian' => 'array',
    ];

    public function penelitianKetua()
    {
        return $this->hasMany(Penelitian::class, 'nidn_ketua', 'nidn');
    }

    public function pkmKetua()
    {
        return $this->hasMany(Pkm::class, 'nidn_ketua', 'nidn');
    }
}
