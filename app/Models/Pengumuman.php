<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'tbl_pengumuman';

    protected $fillable = ['kegiatan', 'tanggal', 'waktu', 'lokasi', 'keterangan'];

    public function agendas() {
        return $this->hasMany(Agenda::class, 'pengumuman_id');
    }
}
