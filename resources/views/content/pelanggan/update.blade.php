@extends('welcome')
@section('title')
    List Pelanggan
@endsection
@section('content')
    <form action=" {{route('pelanggan.update', $pelanggan->kode)}} " method="POST">
        @csrf
        @method('PUT')
       <div class="form-group {{ $errors->has('kode') ? 'has-error' : '' }}">
            <label for="labelinput">Kode</label>
            <input type="text" value="{{$pelanggan->kode}}" class="form-control" name="kode" placeholder="Kode">
            <span class="text-danger">{{ $errors->first('kode') }}</span>
        </div>
        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
            <label for="labelinput">Nama</label>
            <input type="text" value="{{$pelanggan->nama}}" class="form-control" name="nama" placeholder="Nama">
            <span class="text-danger">{{ $errors->first('nama') }}</span>
        </div>
        <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
            <label for="labelinput">alamat</label>
            <textarea name="alamat" class="form-control" >{{$pelanggan->alamat}}</textarea>
            <span class="text-danger">{{ $errors->first('alamat') }}</span>
        </div>
        <button class="btn btn-primary btn-sm" type="submit"> Simpan </button>
        <button class="btn btn-danger btn-sm" type="reset"> Reset </button>
    </form>
@endsection