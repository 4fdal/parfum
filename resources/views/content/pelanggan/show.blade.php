@extends('welcome')
@section('title')
    List Pelanggan
@endsection
@section('content')

    <a href="{{route('pelanggan.create.index')}}" class="btn btn-success btn-sm"> Tambahkan Pelanggan </a>

    <hr>
    
    <div class="table-responsive">
    <table class="table table-hover" id='table-data'>
        <thead>
            <tr>
                <th>#</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;?>
            @foreach ($pelanggan as $item)
                <tr>
                    <th> {{$no++}} </th>
                    <th> {{$item->kode}} </th>
                    <th> {{$item->nama}} </th>
                    <th> {{$item->alamat}} </th>
                    <th> 
                        <a href="{{route('pelanggan.update.index',$item->kode)}}" class="btn btn-info btn-sm"> Show / Edit </a>
                        <a href="" class="btn btn-danger btn-sm" onclick="
                            var cfm = confirm('Yakin Akan Menghapus ?');
                            if(cfm){
                            event.preventDefault();
                            document.getElementById('{{$item->kode}}').submit();
                            }
                        "> <i class="fa fa-times"></i> Delete</a>
                        </div>
                        <form id='{{$item->kode}}' action="{{route('pelanggan.delete',$item->kode)}}" style="display:none;" method="post">
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