<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = "pelanggan";
    protected $primaryKey = "kode" ;
    protected $fillable = ['kode', 'nama', 'alamat'];

    public function penjualan(){
        return $this->hasMany('App\Penjualan', 'kode_pelanggan');
    }
}
