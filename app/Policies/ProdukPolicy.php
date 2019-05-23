<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Produk;

class ProdukPolicy
{
    use HandlesAuthorization;

    public function edit(User $user,Produk $produk)
    {
        return $user->penjual->id == $produk->penjual_id;
    }

    public function update(User $user,Produk $produk)
    {
        return $user->penjual->id == $produk->penjual_id;
    }
}
