<?php

use Faker\Generator as Faker;

$factory->define(App\Pembeli::class, function (Faker $faker) {
    return [
        "kota" => $faker->city,
        "no_telp" => $faker->e164PhoneNumber,
        "alamat" => $faker->address,
        "telah_diverifikasi" => $faker->numberBetween(0,1),
    ];
});
