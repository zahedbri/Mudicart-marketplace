<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Keranjang;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BelanjaRequest;
use App\Item;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function keranjangSaya()
    {
        $user = Auth::user()->load(['pembeli'=>function($query){
            $query->with(['keranjang'=>function($query){
                $query->where('telah_diselesaikan',0)->with(['belanjaan','penjual'=>function($query){
                    $query->with(['user']);
                }]);
            }]);
        }]);


        $daftarBelanja = collect([]);
        
        foreach($user->pembeli->keranjang as $key => $keranjang)
        {
            $keranjang;
            $subtotal = 0;
            $jumlahProduk = 0;
            $penjual = $keranjang->penjual->user->nama;
            foreach($keranjang->belanjaan as $belanjaan)
            {
                $jumlahProduk++;
                $subtotal+=$belanjaan->harga*$belanjaan->jumlah;
            }
            $subKeranjang = collect(
                [
                    'keranjang_id' => $keranjang->id,
                    'penjual' => $penjual,
                    'subtotal' => $subtotal,
                    'jumlah_produk' => $jumlahProduk
                ]
            );
            $daftarBelanja->put($key,$subKeranjang);
        }
        
        return view('users.pembeli.keranjang-saya',compact('daftarBelanja'));
    }

    public function lihatProduk(Produk $produk)
    {
        $user = Auth::user()->load(['pembeli']);
        $keranjang = Keranjang::where('pembeli_id',$user->pembeli->id)
            ->where('telah_diselesaikan',0)
            ->where('penjual_id',$produk->penjual_id)
            ->first();
        if(!is_null($keranjang))
        {
            $belanjaan = Item::select('tb_produk.id as produk_id','tb_belanjaan.harga as harga',DB::raw('tb_belanjaan.harga * tb_belanjaan.jumlah as sub_total'),'tb_produk.nama_produk','tb_belanjaan.id as item_id','tb_produk.satuan_unit')->join('tb_produk','tb_produk.id','tb_belanjaan.produk_id')->where('keranjang_id',$keranjang->id)->get();
        }

        return view('users.pembeli.tambah-keranjang',['belanjaan'=> $belanjaan ?? [],'produk'=>$produk]);
    }

    public function tambahKeranjang(BelanjaRequest $request, Produk $produk)
    {
        $user = Auth::user()->load(['pembeli']);
        $keranjang = Keranjang::where('pembeli_id',$user->pembeli->id)
            ->where('telah_diselesaikan',0)
            ->where('penjual_id',$produk->penjual_id)
            ->with(['belanjaan'])
            ->get();

        if($keranjang->isEmpty()){
            $keranjang = $user->pembeli->keranjang()->save(new Keranjang(['penjual_id'=>$produk->penjual_id]));
        } else {
            $keranjang = $keranjang->first();
        }
        Item::updateOrCreate(
            [
                'produk_id' => $produk->id,
                'keranjang_id' => $keranjang->id
            ],
            [
                'jumlah' => $request->jumlah,
                'harga' => $produk->harga
            ]
        );
        return redirect()->back()->with('success','Item berhasil ditambah !');
    }

    public function detailKeranjang(Keranjang $keranjang)
    {
        $keranjang->load(['belanjaan'=>function($query){
            $query->with(['produk']);
        }]);
        
        return view('users.pembeli.keranjang',compact('keranjang'));
    }
}
