<?php

namespace App\Policies;

use App\User;
use App\Enums\UserLevel;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Produk;

class ItemPolicy
{
    use HandlesAuthorization;

    
    public function store(User $user, Produk $produk)
    {
        return $produk->tersedia;
    }
}
