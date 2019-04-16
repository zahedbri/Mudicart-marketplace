@extends('shared.layout')
@section('content')
    <div class="container">
        <div class="py-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <a class="link-unstyled" href="{{route('register',['driver'])}}">
                        <div class="card">
                            <div class="card-header font-weight-bold">
                                Daftar Driver
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <img class="img img-card" src="{{asset('img/helmet.png')}}" alt="">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{route('register',['penjual'])}}" class="link-unstyled">
                        <div class="card">
                            <div class="card-header font-weight-bold">
                                Daftar Penjual
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <img class="img img-card" src="{{asset('img/seller.png')}}" alt="">                                
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{route('register',['pembeli'])}}" class="link-unstyled">
                        <div class="card">
                            <div class="card-header font-weight-bold">
                                Daftar Pembeli
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <img class="img img-card" src="{{asset('img/employees.png')}}" alt="">                            
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection