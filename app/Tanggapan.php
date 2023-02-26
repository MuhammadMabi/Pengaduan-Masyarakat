<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = "tanggapans";
    protected $primaryKey = "id_tanggapan";
    protected $fillable = [
        'pengaduan_id',
        'nik',
        'tanggal_tanggapan',
        'tanggapan'
    ];
}
