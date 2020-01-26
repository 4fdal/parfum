@extends('welcome')
@section('title')
    Edit Gambar
@endsection
@section('content')
    <form action=" {{route('gambar.update', $gambar->id)}} " enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group {{ $errors->has('jenis') ? 'has-error' : '' }}">
            <label for="labelinput">Jenis</label>
            <select name="id_jenis" class="form-control" id=""> 
                @foreach ($jenis as $item)
                    <option {{ $gambar->id == $item->id ? "selected" : "" }} value=" {{$item->id}} "> {{$item->nama}} </option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('jenis') }}</span>
        </div>
        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
            <label for="labelinput">Nama</label>
            <input type="text" value="{{$gambar->nama}}" class="form-control" name="nama" placeholder="Nama">
            <span class="text-danger">{{ $errors->first('nama') }}</span>
        </div>
        <div class="form-group {{ $errors->has('gambar') ? 'has-error' : '' }}">
            <label for="labelinput">Gambar</label>
            <input type="file" value="{{old('gambar')}}" class="form-control" name="gambar" >
            <span class="text-danger">{{ $errors->first('gambar') }}</span>
        </div>
        <img src=" {{asset('storage/'.$gambar->gambar)}} " class="col-md-2">
        <button class="btn btn-primary btn-sm" type="submit"> Simpan </button>
        <button class="btn btn-danger btn-sm" type="reset"> Reset </button>
    </form>
@endsection