@extends('users.penjual.include.penjual-navbar')

@section('breadcrumb')
    <div class="mt-4">
        <nav class="breadcrumb">
        <a href="{{route('penjual.dashboard')}}" class="breadcrumb-item">Dashboard</a>
        <span class="breadcrumb-item active">Permintaan</span>
        </nav>
    </div>
@endsection

@section('content')
    <div class="table-responsive">
        <h5 class="mt-2 ml-2 mb-2">Detail Keranjang {{$keranjang->pembeli->user->nama}}</h5>
        <table class="table table-striped">
            <thead>
                <th>Nama Produk</th>
                <th>Harga Satuan</th>
                <th>Jumlah</th>
                <th class="text-center">Subtotal</th>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($keranjang->belanjaan as $item)
                <tr>
                    @php 
                        $subtotal = $item->jumlah*$item->harga;
                        $total+=$subtotal;
                    @endphp
                    <td>{{$item->produk->nama_produk}}</td>
                    <td>{{$item->harga}}</td>
                    <td>{{$item->jumlah}}</td>
                    <td class="text-right">{{formatRP($subtotal)}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"><h5>Total</h5></td>
                    <td><h5 class="text-right"><strong><u>{{formatRP($total)}},-<u></strong></h5></td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="mt-3">
        <h5>C</h5>
    </div>
@endsection
