<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $table = "stok";
    protected $fillable = ['id_jenis', 'nama', 'jumlah_stok'];
    public function jenis(){
        return $this->belongsTo('App\Jenis', 'id_jenis');
    }
}
