<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'tbl_kegiatan';

    protected $fillable = ['judul', 'deskripsi', 'tanggal', 'lokasi'];

    public function agenda() {
        return $this->belongsTo(Agenda::class, 'agenda_id');
    }

    public function galeri() {
        return $this->hasMany(Galeri::class, 'kegiatan_id');
    }

}
