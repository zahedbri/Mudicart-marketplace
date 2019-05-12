@extends('users.penjual.include.penjual-navbar')
@section('breadcrumb')
    <div class="mt-4">
        <nav class="breadcrumb">
        <span class="breadcrumb-item active">Dashboard</span>
        </nav>
    </div>
@endsection
@section('content')
    <div class="w-75">
        <h1>Daftar Produk Anda</h1>
        @foreach($daftarProduk as $produk)
            @include('users.penjual.include.produk')
        @endforeach
    </div>
@endsection
