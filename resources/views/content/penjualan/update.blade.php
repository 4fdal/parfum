@extends('welcome')
@section('title')
    Edit Penjualan 
@endsection
@section('content')
    <form action=" {{route('penjualan.update', $penjualan->id)}} " method="POST">
        @csrf
        @method('PUT')
        <div class="form-group {{ $errors->has('harga') ? 'has-error' : '' }}">
            <label for="labelinput">Harga</label>
            <select name="id_harga" class="form-control" id=""> 
                @foreach ($harga as $item)
                    <option {{ $item->id == $penjualan->id_harga ? "selected" : "" }} value=" {{$item->id}} "> {{$item->nama}} {{$item->harga}} </option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('harga') }}</span>
        </div>
        <div class="form-group {{ $errors->has('jumlah') ? 'has-error' : '' }}">
            <label for="labelinput">Jumlah</label>
            <input type="text" value="{{$penjualan->harga->harga}}" class="form-control" name="jumlah" placeholder="Jumlah">
            <span class="text-danger">{{ $errors->first('jumlah') }}</span>
        </div>
        <div class="form-group {{ $errors->has('pelanggan') ? 'has-error' : '' }}">
            <label for="labelinput">Pelanggan</label>
            <select name="kode_pelanggan" class="form-control" id=""> 
                @foreach ($pelanggan as $item)
                    <option {{$item->kode == $penjualan->kode_pelanggan ? "selected" : ""}} value=" {{$item->kode}} "> {{$item->kode}} {{$item->nama}} </option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('pelanggan') }}</span>
        </div>
        <button class="btn btn-primary btn-sm" type="submit"> Simpan </button>
        <button class="btn btn-danger btn-sm" type="reset"> Reset </button>
    </form>
@endsection