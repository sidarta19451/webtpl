<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kemahasiswaan extends Model
{
    use HasFactory;

    protected $table = 'tbl_kemahasiswaan';

    protected $fillable = ['sub_kategori', 'judul', 'deskripsi', 'file_path'];
}
