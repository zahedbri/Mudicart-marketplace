@extends("shared.layout")
@section("content")
    <div class="container">
        <div class="table-responsive my-5">
            <h3>Pendaftar</h3>
            <table class="table table-striped">
                <thead>
                    <th>Nama</th>
                    <th>Sebagai</th>
                    <th>Tanggal Daftar</th>
                    <th>E-Mail</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->nama}}</td>
                        <td>{{$user->type()}}</td>
                        <td>{{$user->tanggalDaftar()}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-right">
                {{$users->links()}}
            </div>
            <div class="clearfix"></div>
        </div>    
    </div>
@endsection