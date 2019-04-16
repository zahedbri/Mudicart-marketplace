<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    protected $table = 'tb_pembeli';
    protected $fillable = ["kota", "alamat", "no_telp"];
    protected $hidden = ['telah_diverifikasi'];

    public function user()
    {
        return $this->belongsTo("App\User");
    }
}
