@extends('welcome')
@section('title')
    Edit Pembelian 
@endsection
@section('content')
    <form action=" {{route('pembelian.update', $pembelian->id)}} " method="POST">
        @csrf
        @method('PUT')
        <div class="form-group {{ $errors->has('jenis') ? 'has-error' : '' }}">
            <label for="labelinput">Jenis</label>
            <select name="id_jenis" class="form-control" id=""> 
                @foreach ($jenis as $item)
                    <option {{ $pembelian->id == $item->id ? "selected" : "" }} value=" {{$item->id}} "> {{$item->nama}} </option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('jenis') }}</span>
        </div>
        <div class="form-group {{ $errors->has('jumlah') ? 'has-error' : '' }}">
            <label for="labelinput">Jumlah</label>
            <input type="text" value="{{$pembelian->jumlah}}" class="form-control" name="jumlah" placeholder="Jumlah">
            <span class="text-danger">{{ $errors->first('jumlah') }}</span>
        </div>
        <div class="form-group {{ $errors->has('harga') ? 'has-error' : '' }}">
            <label for="labelinput">Harga</label>
            <input type="text" value="{{$pembelian->harga}}" class="form-control" name="harga" placeholder="Harga">
            <span class="text-danger">{{ $errors->first('harga') }}</span>
        </div>
        <button class="btn btn-primary btn-sm" type="submit"> Simpan </button>
        <button class="btn btn-danger btn-sm" type="reset"> Reset </button>
    </form>
@endsection