<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TotalPembelian extends Model
{
    protected $table = "total_pembelian";
    protected $fillable = ['total_pembelian', 'total_pengeluaran'];
}
