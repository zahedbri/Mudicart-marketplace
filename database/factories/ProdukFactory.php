<?php

use Faker\Generator as Faker;

$factory->define(App\Produk::class, function (Faker $faker) {
    return [
        'nama_produk' => $faker->country,
        'jumlah_tersedia' => $faker->numberBetween(1,2000),
        'harga' => $faker->numberBetween(1,9)*1000,
        'satuan_unit' => $faker->randomElement(["Kg","Gr","Unit","Buah"]),
        'deskripsi' => $faker->text(200)
    ];
});
