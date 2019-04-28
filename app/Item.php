<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'tb_belanjaan';

    public function keranjang()
    {
        return $this->belongsTo('App\Keranjang');
    }
}
