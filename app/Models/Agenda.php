<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'tbl_agenda';

    protected $fillable = ['tanggal_mulai', 'tanggal_selesai', 'foto', 'kegiatan_id', 'kemahasiswaan_id', 'kegiatan_type'];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }

    public function kemahasiswaan()
    {
        return $this->belongsTo(Kemahasiswaan::class, 'kemahasiswaan_id');
    }

    public function getKegiatanDisplayAttribute()
    {
        if ($this->kegiatan_type === 'kegiatan') {
            return $this->kegiatan ? 'Kegiatan - ' . $this->kegiatan->judul : '-';
        } elseif ($this->kegiatan_type === 'kemahasiswaan') {
            return $this->kemahasiswaan ? $this->kemahasiswaan->sub_kategori . ' - ' . $this->kemahasiswaan->judul : '-';
        }
        return '-';
    }
}
