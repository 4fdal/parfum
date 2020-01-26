@extends('welcome')
@section('title')
    List pembelian
@endsection
@section('content')

    <a href="{{route('pembelian.create.index')}}" class="btn btn-success btn-sm"> Tambahkan pembelian </a>

    <hr>
    
    <div class="table-responsive">
    <table class="table table-hover" id='table-data'>
        <thead>
            <tr>
                <th>#</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;?>
            @foreach ($pembelian as $item)
                <tr>
                    <th> {{$no++}} </th>
                    <th> {{$item->jenis->nama}} </th>
                    <th> {{$item->jumlah}} </th>
                    <th> {{$item->harga}} </th>
                    <th> {{$item->total}} </th>
                    <th> 
                        <a href="{{route('pembelian.update.index',$item->id)}}" class="btn btn-info btn-sm"> Show / Edit </a>
                        <a href="" class="btn btn-danger btn-sm" onclick="
                            var cfm = confirm('Yakin Akan Menghapus ?');
                            if(cfm){
                            event.preventDefault();
                            document.getElementById('{{$item->id}}').submit();
                            }
                        "> <i class="fa fa-times"></i> Delete</a>
                        </div>
                        <form id='{{$item->id}}' action="{{route('pembelian.delete',$item->id)}}" style="display:none;" method="post">
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