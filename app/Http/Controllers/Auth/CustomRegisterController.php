<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\Register\DriverRequest;
use App\Http\Requests\Register\PembeliRequest;
use App\Http\Requests\Register\PenjualRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Enums\UserLevel;
use App\Pembeli;
use App\Penjual;
use App\Driver;
use App\User;

class CustomRegisterController extends Controller
{
    public function buat($jenis = "")
    {
        if(empty($jenis))
        { 
            return redirect()->route('register.index'); 
        }
        $jenisView = ["driver" => "auth.component.register-driver", "pembeli"=>"auth.component.register-pembeli", "penjual" => "auth.component.register-penjual"];
        // cek apabila request URI diizinkan dan mengirim component view path
        if(in_array(($jenis),array_keys($jenisView))){
            return view("auth.register",["viewComponent"=>$jenisView[$jenis],"jenis"=>ucfirst($jenis)]);
        } else {
            return abort(404);
        }
    }
    
    public function simpanDriver(DriverRequest $request)
    {
        $request['jenis'] = UserLevel::DRIVER;
        $request['password'] = Hash::make($request->password);
        DB::transaction(function() use ($request){ 
            $userDriver = User::create($request->all());
            $driver = $userDriver->driver()->create($request->all());
        });
        return redirect()->route('login')->with("success","Akun berhasil dibuat!");
    }

    public function simpanPenjual(PenjualRequest $request)
    {
        $request['jenis'] = UserLevel::PENJUAL;
        $request['password'] = Hash::make($request->password);
        DB::transaction(function() use ($request){
            $userPenjual = User::create($request->all());
            $penjual = $userPenjual->penjual()->create($request->all());
        });        
        return redirect()->route('login')->with("success","Akun berhasil dibuat!");
    }

    public function simpanPembeli(PembeliRequest $request)
    {
        $request['jenis'] = UserLevel::PEMBELI;
        $request['password'] = Hash::make($request->password);
        DB::transaction(function() use ($request){
            $userPembeli = User::create($request->all());
            $pembeli = $userPembeli->pembeli()->create($request->all());
        });
        return redirect()->route('login')->with("success","Akun berhasil dibuat!");
    }
}
