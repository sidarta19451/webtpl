<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'tbl_berita';

    protected $fillable = ['judul', 'isi', 'foto', 'penulis', 'tanggal'];

    /**
     * Perbaiki penamaan route parameter dari {beritum} ke {berita}
     */
    public function getRouteKeyName()
    {
        return 'id';
    }
}
