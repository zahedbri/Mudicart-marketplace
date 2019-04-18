<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'username', 'email', 'password', 'jenis',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function type()
    {
        return ucfirst(strtolower($this->jenis));
    }

    public function admin()
    {
        return $this->hasOne("App\Admin");
    }

    public function driver()
    {
        return $this->hasOne("App\Driver");
    }

    public function penjual()
    {
        return $this->hasOne("App\Penjual");
    }

    public function pembeli()
    {
        return $this->hasOne("App\Pembeli");
    }

    public function tanggalDaftar()
    {
        $tanggal = Carbon::parse($this->created_at);
        return $tanggal->isoFormat("d MMMM Y");
    }
}
