@extends('welcome')
@section('title')
    List penjualan Total
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
                            Nama Pelanggan : {{$item->pelanggan->nama}} 
                        </th>
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
                            <strong> Total Pemebelian  </strong> :  {{$totalPenjualan->total_penjualan}} unit 
                        </div>
                        <div class="col-md-12">
                            <strong> Total Pemasukan  </strong> : RP. {{$totalPenjualan->total_pemasukan}}  
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
@endsection
@section('script')
    <script>
        $("#table-data").DataTable();
    </script>
@endsection