<?php

namespace App\Http\Controllers;

use App\Jenis;
use App\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    private function myRequest($request, $model=[]){
        $model = $model != null ? $model : $request ;
        return [
            'id_jenis' => $request->get('id_jenis', $model->id_jenis),
            'jumlah' => $request->get('jumlah', $model->jumlah),
            'harga' => $request->get('harga', $model->harga),
        ];
    }
    public function index(Pembelian $pembelian){
        $pembelian = $pembelian->all();
        return view('content.pembelian.show', compact('pembelian'));
    }
    public function createIndex(){
        $jenis = Jenis::all();
        return view('content.pembelian.create', compact('jenis'));
    }
    public function updateIndex(Pembelian $pembelian, $id){
        $pembelian = $pembelian->find($id);
        $jenis = Jenis::all();
        return view('content.pembelian.update', compact('pembelian', 'jenis'));
    }
    public function create(Request $request, Pembelian $pembelian){
        $this->validate($request, [
            'id_jenis' => ['required'],
            'jumlah' => ['required', 'numeric'],
            'harga' => ['required', 'numeric'],
        ]);
        $data = $this->myRequest($request) ;
        $data['total'] = $data['jumlah'] * $data['harga'] ;
        $pembelian = $pembelian->create($data);
        return redirect()->route('pembelian.index')->withSuccess('Berhasil Menambahkan pembelian');
    }
    public function update(Request $request, Pembelian $pembelian, $id){
        $pembelian = $pembelian->find($id);
        $data = $this->myRequest($request, $pembelian);
        $data['total'] = $data['jumlah'] * $data['harga'];
        $pembelian->update($data);
        return redirect()->route('pembelian.index')->withSuccess('Berhasil Edit pembelian');
    }
    public function delete(Pembelian $pembelian, $id){
        $pembelian->find($id)->delete();
        return redirect()->route('pembelian.index')->withSuccess('Berhasil Hapus pembelian');
    }
}
