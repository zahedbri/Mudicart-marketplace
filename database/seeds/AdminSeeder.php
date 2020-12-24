<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => 'admin',
            'nama' => 'Administrator',
            'jenis' =>  'SUPERADMIN',
            'password' => Hash::make('admin'),
            'email' => 'admin@admin.com'
        ]);

        $user->admin()->create([
            'no_telp' => 0000000000,
            'alamat' => 'Sungai Raya Dalam, Pontianak',
            'created_at' =>  now(),
            'updated_at' => now(),

        ]);
    }
}
