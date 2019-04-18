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
            factory(App\User::class, 300)
                ->create()
                ->each(function($user){
                    switch($user->jenis)
                    {
                        case UserLevel::PENJUAL:
                            $user->penjual()->save(factory(App\Penjual::class)->make());
                            break;
                        case UserLevel::DRIVER:
                            $user->driver()->save(factory(App\Driver::class)->make());
                            break;
                        case UserLevel::PEMBELI:
                            $user->pembeli()->save(factory(App\Pembeli::class)->make());
                            break;
                        
                    }
                });
        });
    }
}
