<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Driver;
use App\Pembeli;
use App\Penjual;
use App\Enums\UserLevel;


class AdminDashboardController extends Controller
{
    public function index()
    {
        $dataUser = [
            "driver" => [
                "total" => Driver::count(),
                "belumDiverifikasi" => Driver::where("telah_diverifikasi",0)->count(),
                "telahDiverifikasi" => Driver::where("telah_diverifikasi",1)->count(),
            ],
            "penjual" => [
                "total" => Penjual::count(),
                "belumDiverifikasi" => Penjual::where("telah_diverifikasi",0)->count(),
                "telahDiverifikasi" => Penjual::where("telah_diverifikasi",1)->count(),
            ],
            "pembeli" => [
                "total" => Pembeli::count(),
                "belumDiverifikasi" => Pembeli::where("telah_diverifikasi",0)->count(),
                "telahDiverifikasi" => Pembeli::where("telah_diverifikasi",1)->count(),
            ]
            ];
        return view('users.admin.dashboard',["dataUser" => $dataUser]);
    }
}
