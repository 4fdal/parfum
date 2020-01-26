@extends('welcome')
@section('title')
    Tambahkan penjualan
@endsection
@section('content')
    
    <form action=" {{route('penjualan.create')}} " method="POST">
        @csrf
        <div class="form-group {{ $errors->has('harga') ? 'has-error' : '' }}">
            <label for="labelinput">Barang</label>
            <select name="id_harga" class="form-control" id=""> 
                @foreach ($harga as $item)
                    <option value=" {{$item->id}} "> Nama Barang : {{$item->nama}} | Harga : RP. {{$item->harga}} </option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('harga') }}</span>
        </div>
        <div class="form-group {{ $errors->has('jumlah') ? 'has-error' : '' }}">
            <label for="labelinput">jumlah</label>
            <input type="text" value="{{old('jumlah')}}" class="form-control" name="jumlah" placeholder="jumlah">
            <span class="text-danger">{{ $errors->first('jumlah') }}</span>
        </div>
        <div class="form-group {{ $errors->has('pelanggan') ? 'has-error' : '' }}">
            <label for="labelinput">pelanggan</label>
            <select name="kode_pelanggan" class="form-control" id=""> 
                @foreach ($pelanggan as $item)
                    <option value=" {{$item->kode}} "> Kode : {{$item->kode}} | Nama Pelanggan :  {{$item->nama}} </option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('pelanggan') }}</span>
        </div>
        <button class="btn btn-primary btn-sm" type="submit"> Simpan </button>
        <button class="btn btn-danger btn-sm" type="reset"> Reset </button>
    </form>

@endsection