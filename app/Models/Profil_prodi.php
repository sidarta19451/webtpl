<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil_prodi extends Model
{
    use HasFactory;

    protected $table = 'tbl_profil_prodi';

    protected $fillable = ['nama_prodi', 'visi', 'misi',  'deskripsi', 'akreditasi', 'logo', 'kontak_email',
                            'kontak_telepon', 'alamat'];
}
