<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = "pengaduans";
    protected $primaryKey = "id_pengaduan";
    protected $fillable = [
        'user_id',
        'tanggal_pengaduan',
        'isi_laporan',
        'foto',
        'status',
    ];
}
