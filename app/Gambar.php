<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    protected $table = "gambar" ;
    protected $fillable = ['id_jenis', 'nama', 'gambar'] ;

    public function jenis(){
        return $this->belongsTo('App\Jenis', 'id_jenis');
    }
}
