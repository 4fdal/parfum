@extends('welcome')
@section('title')
    Tambahkan Pembelian
@endsection
@section('content')
    
    <form action=" {{route('pembelian.create')}} " method="POST">
        @csrf
        <div class="form-group {{ $errors->has('jenis') ? 'has-error' : '' }}">
            <label for="labelinput">Jenis</label>
            <select name="id_jenis" class="form-control" id=""> 
                @foreach ($jenis as $item)
                    <option value=" {{$item->id}} "> {{$item->nama}} </option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('id_jenis') }}</span>
        </div>
        <div class="form-group {{ $errors->has('jumlah') ? 'has-error' : '' }}">
            <label for="labelinput">Jumlah</label>
            <input type="text" value="{{old('jumlah')}}" class="form-control" name="jumlah" placeholder="Jumlah">
            <span class="text-danger">{{ $errors->first('jumlah') }}</span>
        </div>
        <div class="form-group {{ $errors->has('harga') ? 'has-error' : '' }}">
            <label for="labelinput">Harga</label>
            <input type="text" value="{{old('harga')}}" class="form-control" name="harga" placeholder="Harga">
            <span class="text-danger">{{ $errors->first('harga') }}</span>
        </div>
        <button class="btn btn-primary btn-sm" type="submit"> Simpan </button>
        <button class="btn btn-danger btn-sm" type="reset"> Reset </button>
    </form>

@endsection