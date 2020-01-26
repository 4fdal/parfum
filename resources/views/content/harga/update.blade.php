@extends('welcome')
@section('title')
    Edit harga 
@endsection
@section('content')
    <form action=" {{route('harga.update', $harga->id)}} " method="POST">
        @csrf
        @method('PUT')
        <div class="form-group {{ $errors->has('jenis') ? 'has-error' : '' }}">
            <label for="labelinput">Jenis</label>
            <select name="id_jenis" class="form-control" id=""> 
                @foreach ($jenis as $item)
                    <option {{ $harga->id == $item->id ? "selected" : "" }} value=" {{$item->id}} "> {{$item->nama}} </option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('jenis') }}</span>
        </div>
        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
            <label for="labelinput">Nama</label>
            <input type="text" value="{{$harga->nama}}" class="form-control" name="nama" placeholder="Nama">
            <span class="text-danger">{{ $errors->first('nama') }}</span>
        </div>
        <div class="form-group {{ $errors->has('harga') ? 'has-error' : '' }}">
            <label for="labelinput">Jumlah harga</label>
            <input type="text" value="{{$harga->harga}}" class="form-control" name="harga" placeholder="Jumlah harga">
            <span class="text-danger">{{ $errors->first('harga') }}</span>
        </div>
        <button class="btn btn-primary btn-sm" type="submit"> Simpan </button>
        <button class="btn btn-danger btn-sm" type="reset"> Reset </button>
    </form>
@endsection