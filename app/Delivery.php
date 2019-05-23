<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'tb_status_pengantaran';

    public function keranjang()
    {
        return $this->belongsTo('App\Keranjang');
    }
}
