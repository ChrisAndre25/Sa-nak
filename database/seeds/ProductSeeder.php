<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'seller_id' => 2,
                'category_id' => 1,
                'name' => 'Boneka Beruang',
                'stock' => 50,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore reiciendis sunt iste aliquam non natus doloribus vel? Perspiciatis facere iure, soluta autem, omnis dignissimos, minus corrupti voluptatem iste voluptatum nesciunt.',
                'sell_price' => 40000,
                'rent_price' => 10000,
                'image' => 'boneka_beruang.jpg',
            ],
            [
                'seller_id' => 2,
                'category_id' => 4,
                'name' => 'Burton Backpack',
                'stock' => 100,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore reiciendis sunt iste aliquam non natus doloribus vel? Perspiciatis facere iure, soluta autem, omnis dignissimos, minus corrupti voluptatem iste voluptatum nesciunt.',
                'sell_price' => 100000,
                'rent_price' => 25000,
                'image' => 'burton_backpack.jpg',
            ],
            [
                'seller_id' => 2,
                'category_id' => 6,
                'name' => 'Robot Bumblebee',
                'stock' => 20,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore reiciendis sunt iste aliquam non natus doloribus vel? Perspiciatis facere iure, soluta autem, omnis dignissimos, minus corrupti voluptatem iste voluptatum nesciunt.',
                'sell_price' => 140000,
                'rent_price' => 70000,
                'image' => 'robot_bumblebee.jpg',
            ],
            [
                'seller_id' => 2,
                'category_id' => 2,
                'name' => 'Kamus Oxford',
                'stock' => 10,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore reiciendis sunt iste aliquam non natus doloribus vel? Perspiciatis facere iure, soluta autem, omnis dignissimos, minus corrupti voluptatem iste voluptatum nesciunt.',
                'sell_price' => 100000,
                'rent_price' => 25000,
                'image' => 'kamus_oxford.jpg',
            ],
            [
                'seller_id' => 2,
                'category_id' => 8,
                'name' => 'Disney Pixar Sterling Car',
                'stock' => 25,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore reiciendis sunt iste aliquam non natus doloribus vel? Perspiciatis facere iure, soluta autem, omnis dignissimos, minus corrupti voluptatem iste voluptatum nesciunt.',
                'sell_price' => 50000,
                'rent_price' => 20000,
                'image' => 'sterling_car.jpg',
            ],
            [
                'seller_id' => 2,
                'category_id' => 5,
                'name' => 'Senjata Mainan',
                'stock' => 10,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore reiciendis sunt iste aliquam non natus doloribus vel? Perspiciatis facere iure, soluta autem, omnis dignissimos, minus corrupti voluptatem iste voluptatum nesciunt.',
                'sell_price' => 35000,
                'rent_price' => 15000,
                'image' => 'toy_gun.png',
            ],
            [
                'seller_id' => 2,
                'category_id' => 7,
                'name' => 'Ludo',
                'stock' => 30,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore reiciendis sunt iste aliquam non natus doloribus vel? Perspiciatis facere iure, soluta autem, omnis dignissimos, minus corrupti voluptatem iste voluptatum nesciunt.',
                'sell_price' => 20000,
                'rent_price' => 10000,
                'image' => 'ludo.jpg',
            ],
            [
                'seller_id' => 2,
                'category_id' => 7,
                'name' => 'Permainan Monopoli',
                'stock' => 50,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore reiciendis sunt iste aliquam non natus doloribus vel? Perspiciatis facere iure, soluta autem, omnis dignissimos, minus corrupti voluptatem iste voluptatum nesciunt.',
                'sell_price' => 20000,
                'rent_price' => 10000,
                'image' => 'monopoly.jpg',
            ],
            [
                'seller_id' => 2,
                'category_id' => 2,
                'name' => 'Google Notebook',
                'stock' => 25,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore reiciendis sunt iste aliquam non natus doloribus vel? Perspiciatis facere iure, soluta autem, omnis dignissimos, minus corrupti voluptatem iste voluptatum nesciunt.',
                'sell_price' => 25000,
                'rent_price' => 0,
                'image' => 'google_notebook.jpg',
            ],
            [
                'seller_id' => 2,
                'category_id' => 3,
                'name' => 'Stylus Pen',
                'stock' => 45,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore reiciendis sunt iste aliquam non natus doloribus vel? Perspiciatis facere iure, soluta autem, omnis dignissimos, minus corrupti voluptatem iste voluptatum nesciunt.',
                'sell_price' => 15000,
                'rent_price' => 0,
                'image' => 'stylus_pen.jpeg',
            ],
        ]);
    }
}
