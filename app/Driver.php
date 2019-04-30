<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'tb_driver';
    protected $fillable = ["plat_nomor_kendaraan","kota","alamat","no_telp","foto_profil","foto_sim","nomor_sim"];
    protected $hidden = ['telah_diverifikasi'];


    public function user()
    {
        return $this->belongsTo("App\User");
    }
}
