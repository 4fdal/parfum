@extends('welcome')
@section('content')
    <form action=" {{route('jenis.update', $jenis->id)}} " method="POST">
        @csrf
        @method('PUT')
        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
            <label for="labelinput">Nama</label>
            <input type="text" value="{{$jenis->nama}}" class="form-control" name="nama" placeholder="Nama">
            <span class="text-danger">{{ $errors->first('nama') }}</span>
        </div>
        <div class="form-group {{ $errors->has('keterangan') ? 'has-error' : '' }}">
            <label for="labelinput">Keterangan</label>
            <textarea name="keterangan" class="form-control" >{{$jenis->keterangan}}</textarea>
            <span class="text-danger">{{ $errors->first('keterangan') }}</span>
        </div>
        <button class="btn btn-primary btn-sm" type="submit"> Simpan </button>
        <button class="btn btn-danger btn-sm" type="reset"> Reset </button>
    </form>
@endsection