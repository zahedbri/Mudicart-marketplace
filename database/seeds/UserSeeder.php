<?php

use Illuminate\Database\Seeder;
use App\Enums\UserLevel;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function() {
            factory(App\User::class, 30)
                ->create()
                ->each(function($user){
                    switch($user->jenis)
                    {
                        case UserLevel::DRIVER:
                            $user->driver()->save(factory(App\Driver::class)->make());
                            break;
                        case UserLevel::PEMBELI:
                            $user->driver()->save(factory(App\Pembeli::class)->make());
                            break;
                        case UserLevel::PENJUAL:
                            $user->driver()->save(factory(App\Penjual::class)->make());
                            break;
                    }
                });
        });
    }
}
