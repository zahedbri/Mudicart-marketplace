<?php

use Illuminate\Database\Seeder;


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
                    $user->driver()->save(factory(App\Driver::class)->make());
                });
                
            factory(App\User::class, 30)
                ->create()
                ->each(function($user){
                    $user->driver()->save(factory(App\Penjual::class)->make());
                });

            factory(App\User::class, 30)
                ->create()
                ->each(function($user){
                    $user->driver()->save(factory(App\Penjual::class)->make());
                });
        });
    }
}
