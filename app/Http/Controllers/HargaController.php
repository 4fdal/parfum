<?php

namespace App\Http\Controllers;

use App\Harga;
use App\Jenis;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    private function myRequest($request, $model=[]){
        $model = $model != null ? $model : $request ;
        return [
            'id_jenis' => $request->get('id_jenis', $model->id_jenis),
            'nama' => $request->get('nama', $model->nama),
            'harga' => $request->get('harga', $model->harga),
        ];
    }
    public function index(Harga $harga){
        $harga = $harga->all();
        return view('content.harga.show', compact('harga'));
    }
    public function createIndex(){
        $jenis = Jenis::all();
        return view('content.harga.create', compact('jenis'));
    }
    public function updateIndex(Harga $harga, $id){
        $harga = $harga->find($id);
        $jenis = Jenis::all();
        return view('content.harga.update', compact('harga', 'jenis'));
    }
    public function create(Request $request, Harga $harga){
        $this->validate($request, [
            'id_jenis' => ['required'],
            'nama' => ['required'],
            'harga' => ['required', 'numeric']
        ]);
        $data = $this->myRequest($request) ;
        $harga = $harga->create($data);
        return redirect()->route('harga.index')->withSuccess('Berhasil Menambahkan harga');
    }
    public function update(Request $request, Harga $harga, $id){
        $harga = $harga->find($id);
        $data = $this->myRequest($request, $harga);
        $harga->update($data);
        return redirect()->route('harga.index')->withSuccess('Berhasil Edit harga');
    }
    public function delete(Harga $harga, $id){
        $harga->find($id)->delete();
        return redirect()->route('harga.index')->withSuccess('Berhasil Hapus harga');
    }
}
