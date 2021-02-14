<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_keluar extends Model
{
    protected $table = 'detail_keluar';

    public function berita_keluar()
    {
        return $this->belongsTo(Berita_keluar::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::Class);
    }

    public function berita_keluar()
    {
        return $this->belongsTo(Berita_keluar::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
