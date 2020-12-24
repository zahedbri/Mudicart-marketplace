<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class MainMenuController extends Controller
{
    public function index()
    {
        $produk = Produk::limit('8')->where('tersedia',1)->inRandomOrder()->with(['display'])->get();
        return view('produk',compact('produk'));
    }

    public function lihatProduk(Produk $produk)
    {
        $produk->load(['penjual','gallery']);
        $penjual = $produk->penjual->load(['produk'=>function($query) use ($produk){
            $query->where('id','<>',$produk->id)->inRandomOrder()->limit(10)->with(['display']);
        },'user']);
        return view('detail-produk',['produk'=>$produk, 'penjual'=>$penjual]);
    }
}
