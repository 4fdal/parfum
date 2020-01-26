<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = "pembelian";
    protected $fillable = ['id_jenis', 'jumlah', 'harga', 'total'];
    public function jenis(){
        return $this->belongsTo('App\Jenis', 'id_jenis');
    }
}
