<?php

namespace App\Http\Controllers;

use App\Stok;
use App\Jenis;
use Illuminate\Http\Request;

class StokController extends Controller
{
    private function myRequest($request, $model=[]){
        $model = $model != null ? $model : $request ;
        return [
            'id_jenis' => $request->get('id_jenis', $model->id_jenis),
            'nama' => $request->get('nama', $model->nama),
            'jumlah_stok' => $request->get('jumlah_stok', $model->jumlah_stok),
        ];
    }
    public function index(Stok $stok){
        $stok = $stok->all();
        return view('content.stok.show', compact('stok'));
    }
    public function createIndex(){
        $jenis = Jenis::all();
        return view('content.stok.create', compact('jenis'));
    }
    public function updateIndex(Stok $stok, $id){
        $stok = $stok->find($id);
        $jenis = Jenis::all();
        return view('content.stok.update', compact('stok', 'jenis'));
    }
    public function create(Request $request, Stok $stok){
        $this->validate($request, [
            'id_jenis' => ['required'],
            'nama' => ['required'],
            'jumlah_stok' => ['required', 'numeric']
        ]);
        $data = $this->myRequest($request) ;
        $stok = $stok->create($data);
        return redirect()->route('stok.index')->withSuccess('Berhasil Menambahkan stok');
    }
    public function update(Request $request, Stok $stok, $id){
        $stok = $stok->find($id);
        $data = $this->myRequest($request, $stok);
        $stok->update($data);
        return redirect()->route('stok.index')->withSuccess('Berhasil Edit stok');
    }
    public function delete(Stok $stok, $id){
        $stok->find($id)->delete();
        return redirect()->route('stok.index')->withSuccess('Berhasil Hapus stok');
    }
}
