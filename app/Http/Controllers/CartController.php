<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keranjang;

class CartController extends Controller
{
    public function index()
    {
        
    }

    public function viewOldTransaction()
    {
        $user = Auth::user()->load(['pembeli']);
        $keranjang = Keranjang::where('pembeli_id',$user->pembeli->id)->where('telah_diselesaikan',1)->with(['belanjaan']);
    }
}
