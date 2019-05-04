<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = "tb_keranjang_belanja";
    protected $fillable = ["penjual_id"];

    public function belanjaan()
    {
        return $this->hasMany("App\Item");
    }

    public function penjual()
    {
        return $this->belongsTo('App\Penjual');
    }

    public function pembeli()
    {
        return $this->belongsTo('App\Pembeli');
    }

}
