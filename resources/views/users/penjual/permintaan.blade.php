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
        <h1 class="mt-2">Permintaan Toko Anda</h1>
        <table class="table w-100 table-striped">
            <thead>
                <th>Pembeli</th>
                <th>Kota</th>
                <th>Tanggal Pemesanan</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach($permintaan as $item)
                <tr>
                    <td>{{$item->pembeli->user->nama}}</td>
                    <td>{{$item->pembeli->kota}}</td>
                    <td>{{$item->tanggalPemesanan()}}</td>
                    <td>
                        <a href="{{route('permintaan.detail',[$item->id])}}" class="btn btn-outline-success"><i class="fas fa-check-circle"></i> Proses</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <form id="confirm-order" action="" method="POST">@csrf</form>
    </div>
@endsection

@section('js')
    <script>
        $('.btn-confirm').click(function(){
            swal({
                title: "Proses Pesanan",
                text: "Anda ingin memproses Pesanan?",
                icon: "info",
                buttons: true,
                dangerMode: true,
            }).then((val)=>{
                if(val){
                    formdel = $('form#confirm-order');
                    formdel.attr('action',$(this).data('url'));
                    formdel.submit();
                }
            });
        });
    </script>
@endsection