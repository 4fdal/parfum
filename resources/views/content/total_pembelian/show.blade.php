@extends('welcome')
@section('title')
    List Total pembelian
@endsection
@section('content')

    <a href="{{route('pembelian.create.index')}}" class="btn btn-success btn-sm"> Tambahkan pembelian </a>

    <hr>
    
    <div class="table-responsive">
    <table class="table table-hover" id='table-pembelian'>
        <thead>
            <tr>
                <th>#</th>
                <th>Jenis</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;?>
            @foreach ($pembelian as $item)
                <tr>
                    <th> {{$no++}} </th>
                    <th> {{$item->jenis->nama}} </th>
                    <th> {{$item->jenis->keterangan}} </th>
                    <th> {{$item->jumlah}} </th>
                    <th> {{$item->harga}} </th>
                    <th> {{$item->total}} </th>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card position-relative">
                <div class="card-body">
                    <p class="card-title">Detailed Reports</p>
                    <div class="row">
                        <div class="col-md-12">
                            <strong> Total Pemebelian  </strong> :  {{$totalPembelian->total_pembelian}} unit 
                        </div>
                        <div class="col-md-12">
                            <strong> Total Pemngeluaran  </strong> : RP. {{$totalPembelian->total_pengeluaran}}  
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
@endsection
@section('script')
    <script>
        $("#table-pembelian").DataTable();
    </script>
@endsection