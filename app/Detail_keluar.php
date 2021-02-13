<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_keluar extends Model
{
    protected $table = 'detail_keluar';

    // public function berita_keluar()
    // {
    //     return $this->hasMany(Berita_keluar::class,'id','berita_keluar_id');
    // }

    public function berita_keluar()
    {
        return $this->belongsTo(Berita_keluar::Class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::Class);
    }
}
