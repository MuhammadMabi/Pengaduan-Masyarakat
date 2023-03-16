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
        'kategori_id',
        'tanggal_pengaduan',
        'jam_pengaduan',
        'isi_laporan',
        'status',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'tanggal_pengaduan'=>'datetime',
        'jam_pengaduan'=>'datetime',
    ];

    public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }
}
