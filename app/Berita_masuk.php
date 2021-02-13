<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita_masuk extends Model
{
    protected $table = 'berita_masuk';

    public function penerima()
    {
        return $this->hasOne(Penerima::class,'id','penerima_id');
    }

    public function donatur()
    {
        return $this->hasOne(Donatur::class,'id','donatur_id');
    }

    public function detail_masuk()
    {
        return $this->hasMany(Detail_masuk::Class);
    }
}
