<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TotalPenjualan extends Model
{
    protected $table = "total_penjualan";
    protected $fillable = ['total_penjualan', 'total_pemasukan'];
}
