<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
            [
                'name' => 'Boneka'
            ],
            [
                'name' => 'Buku'
            ],
            [
                'name' => 'Pena'
            ],
            [
                'name' => 'Tas'
            ],
            [
                'name' => 'Senjata Mainan'
            ],
            [
                'name' => 'Robot Mainan'
            ],
            [
                'name' => 'Permainan Papan'
            ],
            [
                'name' => 'Kendaraan Mainan'
            ],
        ]);
    }
}
