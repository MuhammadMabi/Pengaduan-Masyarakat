<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = "tanggapans";
    protected $primaryKey = "id";
    protected $fillable = [
        'pengaduan_id',
        'user_id',
        'tanggal_tanggapan',
        'tanggapan'
    ];

    protected $casts = [ 'tanggal_tanggapan'=>'datetime'];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
