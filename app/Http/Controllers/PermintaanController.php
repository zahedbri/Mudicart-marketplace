<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Keranjang;
use App\Delivery;

class PermintaanController extends Controller
{
    public function lihatPermintaan()
    {
        $user = Auth::user()->load(['penjual']);
        $permintaan = Keranjang::where('penjual_id',$user->penjual->id)
            ->where('telah_diselesaikan',1)
            ->where('telah_diproses',0)
            ->with([
                'belanjaan'=>function($query){
                    $query->with(['produk']);
                },
                'pembeli' => function($query){
                    $query->with(['user']);
                },
            ])
            ->get();

        return view('users.penjual.permintaan', compact('permintaan'));
    }

    public function lihatDetail(Keranjang $keranjang)
    {
        $keranjang->load([
            'belanjaan' => function($query){
                $query->with(['produk']);
            },
            'pembeli'=>function($query){
                $query->with(['user']);
            }
        ]);
        
        return view('users.penjual.detail-permintaan',compact('keranjang'));
    }

    public function proses(Keranjang $keranjang)
    {
        $keranjang->status()->save(new Delivery);
        $keranjang->proses();
        return redirect()->route('permintaan')->with('success','Permintaan telah diproses!');
    }

    public function daftarProses()
    {
        $user = Auth::user()->load(['penjual']);
        $permintaan = Keranjang::where('penjual_id',$user->penjual->id)
            ->where('telah_diproses',1)
            ->with([
                'belanjaan'=>function($query){
                    $query->with(['produk']);
                },
                'pembeli' => function($query){
                    $query->with(['user']);
                },
            ])
            ->get();
    }
}
