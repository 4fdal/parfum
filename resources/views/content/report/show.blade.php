@extends('welcome')
@section('title')
    Report Detail 
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <strong> Total Pemebelian  </strong> :  {{$totalPembelian->total_pembelian}} unit 
        </div>
        <div class="col-md-12">
            <strong> Total Pemngeluaran  </strong> : RP. {{$totalPembelian->total_pengeluaran}}  
        </div> 
        <div class="col-md-12">
            <strong> Total Penjualan  </strong> :  {{$totalPenjualan->total_penjualan}} unit 
        </div>
        <div class="col-md-12">
            <strong> Total Pemasukan  </strong> : RP. {{$totalPenjualan->total_pemasukan}}  
        </div>
    </div>
    <hr>
    <div class="row">       
        <div class="col-md-12">
            <strong> Total Stok  </strong> : {{$total_stok}} unit  
        </div>          
        <div class="col-md-12">
            <strong> Total Uang  </strong> : RP. {{$total_uang}}  
        </div>          
    </div>
    
    
@endsection
@section('script')
    <script>
        $("#table-pembelian").DataTable();
    </script>
@endsection