<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrasi extends Model
{
    use HasFactory;

    protected $table = 'tbl_administrasi';

    protected $fillable = ['sub_kategori', 'judul', 'deskripsi', 'file_path'];
}
