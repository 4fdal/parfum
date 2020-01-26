<?php

namespace App\Http\Controllers;

use App\Penjualan;
use App\TotalPenjualan;
use Illuminate\Http\Request;

class TotalPenjualanController extends Controller
{
    public function index(){
        $penjualan = Penjualan::all();
        $tot_penjualan = 0 ;
        $tot_pemasukan = 0 ;
        foreach ($penjualan as $key => $value) {
            $tot_penjualan += $value->jumlah ;
            $tot_pemasukan += $value->total ;
        }
        $data_total = [
            'total_penjualan' => $tot_penjualan,
            'total_pemasukan' => $tot_pemasukan
        ];
        $totalPenjualan = TotalPenjualan::first();
        if($totalPenjualan == null) {
            $totalPenjualan = TotalPenjualan::create($data_total);
        } else {
            $totalPenjualan->update($data_total);
        }
        return view('content.total_penjualan.show', compact('penjualan','totalPenjualan'));
    }
    
}
