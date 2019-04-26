<a class="link-unstyled produk" href="{{route('produk.edit',[$produk->id])}}">
    <div class="card my-3"> 
        <div class="card-body">
            <h5>{{$produk->nama_produk}}</h5> 
            <hr>
            <p class="text-justify">{{$produk->deskripsi}}</p>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-4 text-center">Harga : {{$produk->harga}}</div>
                <div class="col-md-4 text-center">Jumlah Tersedia : {{$produk->jumlah_tersedia}}</div>
                <div class="col-md-4 text-center">Rata rata penilaian : some stars</div>
            </div>
        </div>
    </div>
</a>