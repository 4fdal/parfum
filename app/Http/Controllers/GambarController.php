<?php

namespace App\Http\Controllers;

use App\Gambar;
use App\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GambarController extends Controller
{
    private function myRequest($request, $model=[]){
        $model = $model != null ? $model : $request ;
        return [
            'id_jenis' => $request->get('id_jenis', $model->id_jenis),
            'nama' => $request->get('nama', $model->nama),
            'gambar' => $request->get('gambar', $model->gambar),
        ];
    }
    private function myFileUpload($requestFile, $dir = "", $deleteFileName=""){
        if($deleteFileName!=""){
            Storage::delete($deleteFileName);
        }
        $file = $requestFile->store($dir);
        return $file ;
    }
    public function index(Gambar $gambar){
        $gambar = $gambar->all();
        return view('content.gambar.show', compact('gambar'));
    }
    public function createIndex(){
        $jenis = Jenis::all();
        return view('content.gambar.create', compact('jenis'));
    }
    public function updateIndex(Gambar $gambar, $id){
        $jenis = Jenis::all();
        $gambar = $gambar->find($id);
        return view('content.gambar.update', compact('gambar', 'jenis'));
    }
    public function create(Request $request, Gambar $gambar){
        $this->validate($request, [
            'id_jenis' => ['required'],
            'nama' => ['required'],
            'gambar' => ['required'],
        ]);
        $data = $this->myRequest($request);
        $data['gambar'] = $this->myFileUpload($request->file('gambar'), "gambar");
        $gambar = $gambar->create($data);
        return redirect()->route('gambar.index')->withSuccess('Berhasil Menambahkan gambar');
    }
    public function update(Request $request, Gambar $gambar, $id){
        $gambar = $gambar->find($id);
        $data = $this->myRequest($request, $gambar);
        if(isset($request->gambar)){
            $data['gambar'] = $this->myFileUpload($request->file('gambar'), "gambar", $data['gambar']);
        }
        $gambar->update($data);
        return redirect()->route('gambar.index')->withSuccess('Berhasil Edit gambar');
    }
    public function delete(Gambar $gambar, $id){
        $gambar->find($id)->delete();
        return redirect()->route('gambar.index')->withSuccess('Berhasil Hapus gambar');
    }
}
