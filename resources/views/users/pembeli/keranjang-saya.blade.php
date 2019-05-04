@extends('default')
@section('breadcrumb')
<div class="container mt-3">
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="{{route('dashboard')}}">Home</a>
        <span class="breadcrumb-item active">Keranjang Saya</span>
    </nav>
</div>
@endsection

@section('content')
    <div style="min-height:65vh" class="container">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>Produk Oleh</th>
                    <th>Jumlah Item pada Keranjang</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @forelse ($daftarBelanja as $item)
                    <tr>
                        <td>{{$item['penjual']}}</td>
                        <td>{{$item['jumlah_produk']}}</td>
                        <td>{{$item['subtotal']}}</td>
                        <td>
                            <button class="btn btn-danger" title="Hapus Belanjaan"><i class="fas fa-trash-alt"></i></button>
                            <a href="{{route('keranjang.detail',[$item['keranjang_id']])}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4"><h5>Maaf Anda belum Memiliki Keranjang Terisi</h5></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection