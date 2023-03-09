<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $primaryKey = 'id';
    protected $fillable = [ 'pengaduan_id', 'image'];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
}

