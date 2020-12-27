<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            array(
                'name' => 'Anton',
                'role' => 'USER',
                'phone_number' => '08131232131',
                'address' => 'Jl.Ponegoro no 29',
                'email' => 'anton123@gmail.com',
                'password' =>   bcrypt('jakarta123'),
            ),
            array(
                'name' => 'Budi',
                'role' => 'USER',
                'phone_number' => '081221232131',
                'address' => 'Jl.Budi Utomo no 89',
                'email' => 'budi123@gmail.com',
                'password' =>   bcrypt('pontianak123'),
            ),
        ));
    }
}
