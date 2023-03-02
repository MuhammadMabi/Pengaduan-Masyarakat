<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pengaduan extends Model
{
    protected $table = "pengaduans";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id',
        'tanggal_pengaduan',
        'isi_laporan',
        'foto',
        'status',
    ];

    public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
