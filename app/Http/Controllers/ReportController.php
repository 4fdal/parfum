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
        $total_stok = $totalPembelian->total_pembelian- $totalPembelian->total_penjualan ;
        $total_uang = $totalPembelian->total_pemasukan - $totalPembelian->total_pengeluaran ;
        return view('content.report.show', compact('totalPembelian', 'totalPenjualan', 'total_stok', 'total_uang'));
    }
}
