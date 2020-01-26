<?php

namespace App\Http\Controllers;

use App\Jenis;
use App\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    private function myRequest($request, $model = [])
    {
        $model = $model != null ? $model : $request;
        return [
            'kode' => $request->get('kode', $model->kode),
            'nama' => $request->get('nama', $model->nama),
            'alamat' => $request->get('alamat', $model->alamat),
        ];
    }
    public function index(Pelanggan $pelanggan)
    {
        $pelanggan = $pelanggan->all();
        return view('content.pelanggan.show', compact('pelanggan'));
    }
    public function createIndex()
    {
        $jenis = Jenis::all();
        return view('content.pelanggan.create', compact('jenis'));
    }
    public function updateIndex(Pelanggan $pelanggan, $id)
    {
        $pelanggan = $pelanggan->find($id);
        $jenis = Jenis::all();
        return view('content.pelanggan.update', compact('pelanggan', 'jenis'));
    }
    public function create(Request $request, Pelanggan $pelanggan)
    {
        $this->validate($request, [
            'kode' => ['required', 'unique:pelanggan'],
            'nama' => ['required'],
            'alamat' => ['required']
        ]);
        $data = $this->myRequest($request);
        $pelanggan = $pelanggan->create($data);
        return redirect()->route('pelanggan.index')->withSuccess('Berhasil Menambahkan pelanggan');
    }
    public function update(Request $request, Pelanggan $pelanggan, $id)
    {
        $pelanggan = $pelanggan->find($id);
        $data = $this->myRequest($request, $pelanggan);
        $pelanggan->update($data);
        return redirect()->route('pelanggan.index')->withSuccess('Berhasil Edit pelanggan');
    }
    public function delete(Pelanggan $pelanggan, $id)
    {
        $pelanggan->find($id)->delete();
        return redirect()->route('pelanggan.index')->withSuccess('Berhasil Hapus pelanggan');
    }
}
