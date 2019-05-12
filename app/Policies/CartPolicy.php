<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Keranjang;

class CartPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Keranjang $keranjang)
    {
        return $user->pembeli->id == $keranjang->pembeli_id && !$keranjang->telah_diselesaikan && !$keranjang->sedang_diproses;
    }

}
