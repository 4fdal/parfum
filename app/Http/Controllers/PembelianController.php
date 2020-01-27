<?php

namespace App\Http\Controllers;

use App\Jenis;
use App\Pembelian;
use App\Stok;
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
            'id_jenis' => ['required', 'unique:pembelian'],
            'jumlah' => ['required', 'numeric'],
            'harga' => ['required', 'numeric'],
        ]);
        $data = $this->myRequest($request) ;
        $data['total'] = $data['jumlah'] * $data['harga'] ;
        // penambahan stok 
        $stok = Stok::where('id_jenis', $data['id_jenis'])->first();
        if($stok == null){
            $jenis = Jenis::find($data['id_jenis']);
            $stok = Stok::create([
                'id_jenis' => $jenis->id_jenis,
                'nama' => $jenis->nama,
                'jumlah_stok' => $data['jumlah']
            ]);
        } else {
            $jumlah_stok = $stok->jumlah_stok + $data['jumlah'];
            $stok->update([
                'jumlah_stok' => $jumlah_stok
            ]);
        }
        // end
        $pembelian = $pembelian->create($data);
        return redirect()->route('pembelian.index')->withSuccess('Berhasil Menambahkan pembelian');
    }
    public function update(Request $request, Pembelian $pembelian, $id){
        $pembelian = $pembelian->find($id);
        $data = $this->myRequest($request, $pembelian);
        $data['total'] = $data['jumlah'] * $data['harga'];
        // penambahan stok 
        $stok = Stok::where('id_jenis', $data['id_jenis'])->first();
        if ($stok == null) {
            $jenis = Jenis::find($data['id_jenis']);
            $stok = Stok::create([
                'id_jenis' => $jenis->id_jenis,
                'nama' => $jenis->nama,
                'jumlah_stok' => $data['jumlah']
            ]);
        } else {
            $jumlah_stok = $stok->jumlah_stok - $pembelian->jumlah ;
            $jumlah_stok = $jumlah_stok  + $data['jumlah'];
            $stok->update([
                'jumlah_stok' => $jumlah_stok
            ]);
        }
        // end
        $pembelian->update($data);
        return redirect()->route('pembelian.index')->withSuccess('Berhasil Edit pembelian');
    }
    public function delete(Pembelian $pembelian, $id){
        $pembelian = $pembelian->find($id);
        $stok = Stok::where('id_jenis', $pembelian->id_jenis)->first();
        if ($stok != null) {
            $jumlah_stok = $stok->jumlah_stok - $pembelian->jumlah;
            if($jumlah_stok <= 0){
                $jumlah_stok = 0 ;
            }
            $stok->update([
                'jumlah_stok' => $jumlah_stok
            ]);
        }
        $pembelian->delete();
        return redirect()->route('pembelian.index')->withSuccess('Berhasil Hapus pembelian');
    }
}
