<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_keluar extends Model
{
    protected $table = 'detail_keluar';

    public function berita_masuk()
    {
        return $this->hasMany(Berita_masuk::class,'id','berita_masuk_id');
    }
}
