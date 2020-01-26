<?php

namespace App\Http\Controllers;

use App\TotalPembelian;
use App\TotalPenjualan;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $totalPembelian = TotalPembelian::first();
        $totalPenjualan = TotalPenjualan::first();
        
    }
}
