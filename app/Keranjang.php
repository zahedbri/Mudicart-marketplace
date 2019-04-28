<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = "tb_keranjang_belanja";

    public function belanjaan()
    {
        return $this->hasMany("App\Item");
    }

    public function pembeli()
    {
        return $this->belongsTo('App\Pembeli');
    }
}
