<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    protected $table = "harga";
    protected $fillable = ['nama', 'harga', 'id_jenis'];
    public function jenis(){
        return $this->belongsTo('App\Jenis', 'id_jenis');
    }
    public function penjualan(){
        return $this->hasMany('App\Penjualan', 'id_harga');
    }
}
