<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    // HastFactory

    protected $table = 'tbl_mahasiswa';

    protected $fillable = ['nim','nama','email','jurusan','angkatan','foto','status'];

    public function pkmAnggota()
    {
        return $this->belongsToMany(Pkm::class, 'nim', 'nim');
    }
}
