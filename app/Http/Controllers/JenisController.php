<?php

namespace App\Http\Controllers;

use App\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    private function myRequest($request, $model=[]){
        $model = $model != null ? $model : $request ;
        return [
            'nama' => $request->get('nama', $model->nama),
            'keterangan' => $request->get('keterangan', $model->keterangan),
        ];
    }
    public function index(Jenis $jenis){
        $jenis = $jenis->all();
        return view('content.jenis.show', compact('jenis'));
    }
    public function createIndex(){
        return view('content.jenis.create');
    }
    public function updateIndex(Jenis $jenis, $id){
        $jenis = $jenis->find($id);
        return view('content.jenis.update', compact('jenis'));
    }
    public function create(Request $request, Jenis $jenis){
        $this->validate($request, [
            'nama' => ['required'],
            'keterangan' => ['required'],
        ]);
        $jenis = $jenis->create($this->myRequest($request));
        return redirect()->route('jenis.index')->withSuccess('Berhasil Menambahkan Jenis');
    }
    public function update(Request $request, Jenis $jenis, $id){
        $jenis = $jenis->find($id);
        $jenis->update($this->myRequest($request, $jenis));
        return redirect()->route('jenis.index')->withSuccess('Berhasil Edit Jenis');
    }
    public function delete(Jenis $jenis, $id){
        $jenis->find($id)->delete();
        return redirect()->route('jenis.index')->withSuccess('Berhasil Hapus Jenis');
    }
}
