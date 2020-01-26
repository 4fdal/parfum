@extends('welcome')
@section('title')
    List Stok
@endsection
@section('content')

    <a href="{{route('stok.create.index')}}" class="btn btn-success btn-sm"> Tambahkan stok </a>

    <hr>
    
    <div class="table-responsive">
    <table class="table table-hover" id='table-data'>
        <thead>
            <tr>
                <th>#</th>
                <th>Jenis</th>
                <th>Nama</th>
                <th>Jumlah Stok</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;?>
            @foreach ($stok as $item)
                <tr>
                    <th> {{$no++}} </th>
                    <th> {{$item->jenis->nama}} </th>
                    <th> {{$item->nama}} </th>
                    <th> {{$item->jumlah_stok}} </th>
                    <th> 
                        <a href="{{route('stok.update.index',$item->id)}}" class="btn btn-info btn-sm"> Show / Edit </a>
                        <a href="" class="btn btn-danger btn-sm" onclick="
                            var cfm = confirm('Yakin Akan Menghapus ?');
                            if(cfm){
                            event.preventDefault();
                            document.getElementById('{{$item->id}}').submit();
                            }
                        "> <i class="fa fa-times"></i> Delete</a>
                        </div>
                        <form id='{{$item->id}}' action="{{route('stok.delete',$item->id)}}" style="display:none;" method="post">
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