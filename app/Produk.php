<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'tb_produk';
    protected $fillable = ['nama_produk','jumlah_tersedia','harga','satuan_unit','deskripsi'];

    public function penjual()
    {
        return $this->belongsTo('App\Penjual');
    }

    public function harga()
    {
        return 'Rp. '.number_format($this->harga,0,',','.');
    }

    public function jumlah()
    {
        return $this->jumlah_tersedia." ".ucfirst(strtolower($this->satuan_unit));
    }

    public function gallery()
    {
        return $this->hasMany('App\FotoProduk');
    }

    public function displayUrl()
    {
        $gallery = $this->gallery; 
        return $gallery->isEmpty() ? asset('img/product.jpg') : asset('storage/foto_produk/'.$gallery->first()->foto_produk);
    }

    public function deskripsi()
    {
        return nl2br($this->deskripsi);
    }

}
