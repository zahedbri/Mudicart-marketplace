<?php

namespace App\Enums;

class UserLevel
{
    const SUPERADMIN = 'SUPERADMIN';
    const PENJUAL = 'PENJUAL';
    const PEMBELI = 'PEMBELI';
    const DRIVER = 'DRIVER';

    const LEVELS = [
        self::SUPERADMIN => "Super Admin",
        self::PENJUAL => "Penjual",
        self::PEMBELI => "Pembeli",
        self::DRIVER => "Driver",
    ];
}