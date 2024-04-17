<?php

namespace Database\Seeders;

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
        //
        \DB::table('products')->insert([
            [
            'name' => 'Samsung',
            'description' => 'lorem',
            'image' => 'https://fakestoreapi.com/img/71li-ujtlUL._AC_UX679_.jpg',
            'price' => 10000,
            'created_at'=>now(),
             ]
            ,
            [
                'name' => 'apple',
                'description' => 'lorem',
                'image' => 'https://fakestoreapi.com/img/71-3HjGNDUL._AC_SY879._SX._UX._SY._UY_.jpg',
                'price' => 20000,
                'created_at'=>now(),
            ],
            [
                'name' => 'xiaomi',
                'description' => 'lorem',
                'image' => 'https://fakestoreapi.com/img/71kWymZ+c+L._AC_SX679_.jpg',
                'price' => 30000,
                'created_at'=>now(),]

        ]);
    }
}