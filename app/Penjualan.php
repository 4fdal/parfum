<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = "penjualan";
    protected $fillable = ['id_jenis', 'id_harga', 'jumlah', 'total', 'kode_pelanggan'];
    public function jenis(){
        return $this->belongsTo('App\Jenis', 'id_jenis');
    }
    public function harga(){
        return $this->belongsTo('App\Harga', 'id_harga');
    }
    public function pelanggan(){
        return $this->belongsTo('App\Pelanggan', 'kode_pelanggan');
    }
}
