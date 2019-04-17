<?php

use Faker\Generator as Faker;

$factory->define(App\Driver::class, function (Faker $faker) {
    return [
        "plat_nomor_kendaraan" => $faker->unique()->regexify('/^[A-Z]{1,2}[0-9]{1,3}[A-Z]{1,3}/'),
        "no_telp" => $faker->unique()->e164PhoneNumber,
        "kota" => $faker->city,
        'alamat' => $faker->address,
        'telah_diverifikasi' => $faker->randomElement([0,1])
    ];
});
