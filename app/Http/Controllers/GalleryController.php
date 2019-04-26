<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Http\Requests\FotoProdukRequest;
use App\FotoProduk;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function create(Produk $produk)
    {
        $galeri = $produk->load(['gallery'])->gallery;
        return view('users.penjual.galeri',compact('galeri'));
    }

    public function store(FotoProdukRequest $request, Produk $produk)
    {
        $fileName = uniqid("foto-").".".$request->file('foto_produk')->extension();
        $request->file('foto_produk')->storeAs('foto_produk',$fileName,'public');
        $produk->gallery()->create(['foto_produk'=>$fileName]);
        return redirect()->back()->with('success','Foto Berhasil di Upload');
    }

    public function delete(FotoProduk $fotoproduk)
    {
        Storage::disk('public')->delete("foto_produk/".$fotoproduk->foto_produk);
        $fotoproduk->delete();
        return redirect()->back();
    }
}
