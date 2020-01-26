@extends('welcome')
@section('title')
    Tambahkan Stok
@endsection
@section('content')
    
    <form action=" {{route('stok.create')}} " method="POST">
        @csrf
        <div class="form-group {{ $errors->has('jenis') ? 'has-error' : '' }}">
            <label for="labelinput">Jenis</label>
            <select name="id_jenis" class="form-control" id=""> 
                @foreach ($jenis as $item)
                    <option value=" {{$item->id}} "> {{$item->nama}} </option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('jenis') }}</span>
        </div>
        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
            <label for="labelinput">Nama</label>
            <input type="text" value="{{old('nama')}}" class="form-control" name="nama" placeholder="Nama">
            <span class="text-danger">{{ $errors->first('nama') }}</span>
        </div>
        <div class="form-group {{ $errors->has('jumlah_stok') ? 'has-error' : '' }}">
            <label for="labelinput">Jumlah stok</label>
            <input type="text" value="{{old('jumlah_stok')}}" class="form-control" name="jumlah_stok" placeholder="Jumlah stok">
            <span class="text-danger">{{ $errors->first('jumlah_stok') }}</span>
        </div>
        <button class="btn btn-primary btn-sm" type="submit"> Simpan </button>
        <button class="btn btn-danger btn-sm" type="reset"> Reset </button>
    </form>

@endsection