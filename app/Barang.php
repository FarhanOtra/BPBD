<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    public function jenis()
    {
        return $this->hasOne(Jenis_barang::class,'id','jenisbarang_id');
    }

    public function detail_masuk()
    {
        return $this->hasMany(Detail_masuk::Class);
    }

    public function detail_keluar()
    {
        return $this->hasMany(Detail_keluar::Class);
    }
}
