<?php

namespace App\Http\Controllers;

use App\Stok;
use App\Harga;
use App\Jenis;
use App\Pelanggan;
use App\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    private function myRequest($request, $model=[]){
        $model = $model != null ? $model : $request ;
        return [
            'id_harga' => $request->get('id_harga', $model->id_harga),
            'jumlah' => $request->get('jumlah', $model->jumlah),
            'kode_pelanggan' => $request->get('kode_pelanggan', $model->kode_pelanggan),
        ];
    }
    public function index(Penjualan $penjualan){
        $penjualan = $penjualan->all();
        return view('content.penjualan.show', compact('penjualan'));
    }
    public function createIndex(){
        $jenis = Jenis::all();
        $harga = Harga::all();
        $pelanggan = Pelanggan::all();
        return view('content.penjualan.create', compact('pelanggan', 'jenis', 'harga'));
    }
    public function updateIndex(Penjualan $penjualan, $id){
        $penjualan = $penjualan->find($id);
        $jenis = Jenis::all();
        $harga = Harga::all();
        $pelanggan = Pelanggan::all();
        return view('content.penjualan.update', compact('penjualan' ,'pelanggan', 'jenis', 'harga'));
    }
    public function create(Request $request, Penjualan $penjualan){
        $this->validate($request, [
            'id_harga' => ['required', 'numeric'],
            'jumlah' => ['required', 'numeric'],
            'kode_pelanggan' => ['required'],
        ]);
        $data = $this->myRequest($request) ;
        $harga = Harga::find($data['id_harga']);
        // pengurangan stok 
        $stok = Stok::where('id_jenis', $harga->jenis->id)->first();
        if($stok == null){
            return redirect()->back()->withDanger('Stok Tidak Ada');
        } else {
            $jumlah_stok = $stok->jumlah_stok - $data['jumlah'];
            if ($jumlah_stok <= 0) {
                return redirect()->back()->withDanger('Jumlah stok tidak mencukupi untuk pembelian');
            } else {
                $stok->update([
                    'jumlah_stok' => $jumlah_stok
                ]);
            }  
        }
        // end
        $data['id_jenis'] = $harga->id_jenis ;
        $data['total'] = $data['jumlah'] * $harga->harga ;
        $penjualan = $penjualan->create($data);
        return redirect()->route('penjualan.index')->withSuccess('Berhasil Menambahkan penjualan');
    }
    public function update(Request $request, Penjualan $penjualan, $id){
        $penjualan = $penjualan->find($id);
        $data = $this->myRequest($request, $penjualan);
        $harga = Harga::find($data['id_harga']);
        // update pengurangan stok 
        $stok = Stok::where('id_jenis', $harga->jenis->id)->first();
        $jumlah_stok = $stok->jumlah_stok + $penjualan->jumlah;
        $jumlah_stok = $jumlah_stok - $data['jumlah'];
        if ($jumlah_stok <= 0) {
            return redirect()->back()->withDanger('Jumlah stok tidak mencukupi untuk pembelian');
        } else {
            $stok->update([
                'jumlah_stok' => $jumlah_stok
            ]);
        }   
        // end
        $data['id_jenis'] = $harga->id_jenis;
        $data['total'] = $data['jumlah'] * $harga->harga;
        $penjualan->update($data);
        return redirect()->route('penjualan.index')->withSuccess('Berhasil Edit penjualan');
    }
    public function delete(Penjualan $penjualan, $id){
        $penjualan = $penjualan->find($id);
        $stok = Stok::where('id_jenis', $penjualan->id_jenis)->first();
        if($stok != null){
            $jumlah_stok = $stok->jumlah_stok + $penjualan->jumlah;
        }
        $penjualan->delete();
        return redirect()->route('penjualan.index')->withSuccess('Berhasil Hapus penjualan');
    }
}
