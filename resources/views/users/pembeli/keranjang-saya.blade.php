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
    <div style="min-height:70vh" class="container">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            {{Session::get('success')}}
        </div>
        @endif
        <div class="table-responsive">
            <div>
                <a href="{{route('keranjang.diproses')}}" class="btn btn-sm btn-outline-info float-right"><i class="fas fa-arrow-right"></i> Lihat Transaksi</a>
                <h1 class="mt-3">Keranjang Saya</h1>
            </div>
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
                            <button data-url="{{route('keranjang.hapus',[$item['keranjang_id']])}}" class="btn btn-danger btn-delete-cart" title="Hapus Belanjaan"><i class="fas fa-trash-alt"></i></button>
                            <a href="{{route('keranjang.detail',[$item['keranjang_id']])}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                            <button class="btn btn-success btn-checkout-cart" data-url="{{route('keranjang.checkout',[$item['keranjang_id']])}}" title="Selesaikan Transaksi"><i class="fas fa-check"></i> Checkout</button>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4"><h5>Maaf Anda belum Memiliki Keranjang Terisi</h5></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <form action="" method="POST" id="delete-cart">@csrf</form>
            <form action="" method="POST" id="checkout-cart">@csrf</form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('.btn-delete-cart').click(function(){
            swal({
                title: "Menghapus Keranjang",
                text: "Apakah anda ingin menghapus keranjang beserta isinya?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((val)=>{
                if(val){
                    formdel = $('form#delete-cart');
                    formdel.attr('action',$(this).data('url'));
                    formdel.submit();
                }
            });
        });

        $('.btn-checkout-cart').click(function(){
            swal({
                title: "Selesaikan Belanjaan",
                text: "Anda ingin menyelesaikan transaksi?",
                icon: "info",
                buttons: true,
                dangerMode: true,
            }).then((val)=>{
                if(val){
                    formdel = $('form#checkout-cart');
                    formdel.attr('action',$(this).data('url'));
                    formdel.submit();
                }
            });
        });
    </script>
@endsection