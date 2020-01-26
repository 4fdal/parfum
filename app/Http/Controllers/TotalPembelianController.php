<?php

namespace App\Http\Controllers;

use App\Penjualan;
use Illuminate\Http\Request;

class TotalPembelianController extends Controller
{
    public function index(){
        $penjualan = Penjualan::all();
        $tot_pembelian = 0 ;
        $tot_pengeluaran = 0 ;
        foreach ($penjualan as $key => $value) {
            $tot_pembelian += $value->jumlah ;
            $tot_pengeluaran += $value->total ;
        }
        return view('content.total_pembelian.view', compact('penjualan', 'tot_pembelian', 'tot_pengeluaran'));
    }
    
}
