<?php

namespace App\Http\Controllers;

use App\Pembelian;
use App\TotalPembelian;
use Illuminate\Http\Request;

class TotalPembelianController extends Controller
{
    public function index(){
        $pembelian = Pembelian::all();
        $tot_pembelian = 0 ;
        $tot_pengeluaran = 0 ;
        foreach ($pembelian as $key => $value) {
            $tot_pembelian += $value->jumlah ;
            $tot_pengeluaran += $value->total ;
        }
        $data_total = [
            'total_pembelian' => $tot_pembelian,
            'total_pengeluaran' => $tot_pengeluaran,
        ];
        $totalPembelian = TotalPembelian::first();
        if($totalPembelian == null){
            $totalPembelian = TotalPembelian::create($data_total);
        } else {
            $totalPembelian->update($data_total);
        }
        return view('content.total_pembelian.show', compact('pembelian', 'totalPembelian'));
    }
    
}
