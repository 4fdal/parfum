@extends('welcome')
@section('title')
    List penjualan
@endsection
@section('content')

    <a href="{{route('penjualan.create.index')}}" class="btn btn-success btn-sm"> Tambahkan penjualan </a>

    <hr>
    
    <div class="table-responsive">
    <table class="table table-hover" id='table-data'>
        <thead>
            <tr>
                <th>#</th>
                <th>Jenis</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Pelanggan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;?>
            @foreach ($penjualan as $item)
                <tr>
                    <th> {{$no++}} </th>
                    <th> {{$item->jenis->nama}} </th>
                    <th> {{$item->harga->nama}} </th>
                    <th> {{$item->harga->harga}} </th>
                    <th> {{$item->jumlah}} </th>
                    <th> {{$item->total}} </th>
                    <th> 
                        Kode Pelanggan : {{$item->pelanggan->kode}} <br/> 
                        Nama Pelanggan : {{$item->pelanggan->nama}} </th>
                    <th> 
                        <a href="{{route('penjualan.update.index',$item->id)}}" class="btn btn-info btn-sm"> Show / Edit </a>
                        <a href="" class="btn btn-danger btn-sm" onclick="
                            var cfm = confirm('Yakin Akan Menghapus ?');
                            if(cfm){
                            event.preventDefault();
                            document.getElementById('{{$item->id}}').submit();
                            }
                        "> <i class="fa fa-times"></i> Delete</a>
                        </div>
                        <form id='{{$item->id}}' action="{{route('penjualan.delete',$item->id)}}" style="display:none;" method="post">
                        {{ csrf_field() }} {{method_field('DELETE')}}
                        </form> 
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    
    
@endsection
@section('script')
    <script>
        $("#table-data").DataTable();
    </script>
@endsection