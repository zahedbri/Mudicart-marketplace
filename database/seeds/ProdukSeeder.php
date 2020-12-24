<?php

use Illuminate\Database\Seeder;
use App\Penjual;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penjual = Penjual::all();
        foreach($penjual as $penj){
            for($i = 0 ; $i < 30 ; $i++){
                $penj->produk()->save(factory(App\Produk::class)->make());
            }
        }
        
    }
}
