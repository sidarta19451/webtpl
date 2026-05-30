<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'tbl_admin';

    protected $fillable = [
        'nama',
        'bagian',
        'email',
        'no_tlp',
        'foto'
    ];
}
