<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita_keluar extends Model
{
    
    protected $table = 'berita_keluar';

    public function pihak_pertama()
    {
        return $this->hasOne(Pihak_pertama::class,'id','pihak_pertama_id');
    }

    public function pihak_kedua()
    {
        return $this->hasOne(Pihak_kedua::class,'id','pihak_kedua_id');
    }

    public function detail_keluar()
    {
        return $this->hasMany(Detail_keluar::Class);
    }

}

