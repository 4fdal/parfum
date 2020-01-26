@extends('welcome')
@section('title')
    Tambahkan Jenis
@endsection
@section('content')
    
    <form action=" {{route('jenis.create')}} " method="POST">
        @csrf
        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
            <label for="labelinput">Nama</label>
            <input type="text" value="{{old('nama')}}" class="form-control" name="nama" placeholder="Nama">
            <span class="text-danger">{{ $errors->first('nama') }}</span>
        </div>
        <div class="form-group {{ $errors->has('keterangan') ? 'has-error' : '' }}">
            <label for="labelinput">Keterangan</label>
            <textarea name="keterangan" class="form-control" >{{old('keterangan')}}</textarea>
            <span class="text-danger">{{ $errors->first('keterangan') }}</span>
        </div>
        <button class="btn btn-primary btn-sm" type="submit"> Simpan </button>
        <button class="btn btn-danger btn-sm" type="reset"> Reset </button>
    </form>

@endsection