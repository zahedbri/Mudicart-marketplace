<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoProduk extends Model
{
    protected $table ='tb_foto_produk';
    protected $fillable = ['foto_produk'];
    
    public function url()
    {
        return asset('storage/foto_produk/'.$this->foto_produk);
    }
}
