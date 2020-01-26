<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = "jenis";
    protected $fillable = ['nama', 'keterangan'];

    public function gambar(){
        return $this->hasMany('App\Gambar', 'id_jenis');
    }
    public function harga(){
        return $this->hasMany('App\Harga', 'id_jenis');
    }
    public function pembelian(){
        return $this->hasMany('App\Pembelian', 'id_jenis');
    }
}
