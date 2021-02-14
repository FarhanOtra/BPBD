<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_masuk extends Model
{
    protected $table = 'detail_masuk';

    public function berita_masuk()
    {
        return $this->belongsTo(Berita_masuk::Class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::Class);
    }
}


