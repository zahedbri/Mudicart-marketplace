@extends('users.penjual.include.penjual-navbar')
@section('content')
    @foreach($daftarProduk as $produk)
        @include('users.penjual.include.produk')
    @endforeach
@endsection
