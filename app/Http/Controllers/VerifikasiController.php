<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\UserLevel;
use App\User;
use App\Driver;
use App\Pembeli;
use App\Penjual;



class VerifikasiController extends Controller
{
    public function indexDriver()
    {
        $user = User::where('jenis','driver')->with("driver")->paginate(15);
        return view('users.admin.daftar-driver',["users" => $user]);
    }

    public function indexPembeli()
    {
        $user = User::where('jenis','pembeli')->with("pembeli")->paginate(15);
        return view('users.admin.daftar-pembeli',["users" => $user]);
    }

    public function indexPenjual()
    {
        $user = User::where('jenis','penjual')->with("penjual")->paginate(15);
        return view('users.admin.daftar-penjual',["users" => $user]);
    }

    public function updateDriver($idDriver)
    {
        $driver = Driver::findOrFail($driverId);
        // toggle status
        $driver->telah_diverifikasi = $driver->telah_diverifikasi ? 0 : 1;
        $driver->save();
        return redirect()->back()->with('info',"Status ". $driver->user->nama ." telah diperbaharui");
    }

    public function updatePembeli($idPembeli)
    {
        $pembeli = Pembeli::findOrFail($idPembeli);
        // toggle status
        $pembeli->telah_diverifikasi = $pembeli->telah_diverifikasi ? 0 : 1;
        $pembeli->save();
        return redirect()->back()->with('info',"Status ". $pembeli->user->nama ." telah diperbaharui");
    }

    public function updatePenjual($idPenjual)
    {
        $penjual = Penjual::findOrFail($idPenjual);
        // toggle status
        $penjual->telah_diverifikasi = $penjual->telah_diverifikasi ? 0 : 1;
        $penjual->save();
        return redirect()->back()->with('info',"Status ". $penjual->user->nama ." telah diperbaharui");
    }
}
