<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Produk;
use App\FotoProduk;
use App\Enums\UserLevel;

class GalleryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function create(User $user, Produk $produk)
    {
        if($user->jenis == UserLevel::PENJUAL)
        {
            return $user->penjual->id == $produk->penjual_id;
        }
        return false;
    }

    public function store(User $user, Produk $produk)
    {
        if($user->jenis == UserLevel::PENJUAL)
        {
            return $user->penjual->id == $produk->penjual_id;
        }
        return false;
    }

    public function edit(User $user, FotoProduk $fotoproduk)
    {
        if($user->jenis == UserLevel::PENJUAL)
        {
            return $user->penjual->id == $fotoproduk->produk->penjual_id;
        }
        return false;
    }

    public function update(User $user, FotoProduk $fotoproduk)
    {
        if($user->jenis == UserLevel::PENJUAL)
        {
            return $user->penjual->id == $fotoproduk->produk->penjual_id;
        }
        return false;
    }

    public function delete(User $user, FotoProduk $fotoproduk)
    {
        if($user->jenis == UserLevel::PENJUAL)
        {
            return $user->penjual->id == $fotoproduk->produk->penjual_id;
        }
        return false;
    }

}