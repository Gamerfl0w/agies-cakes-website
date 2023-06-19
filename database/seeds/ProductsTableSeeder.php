<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
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
                'id'=>1,
                'name'=>"Caramel Cake 6'",
                'price'=>275.00,
                'image'=>'products/1.jpg',
                'quantity'=>1
            ],
            [
                'id'=>2,
                'name'=>"Custard Cake 6'",
                'price'=>275.00,
                'image'=>'products/2.jpg',
                'quantity'=>12
            ],
            [
                'id'=>3,
                'name'=>"Chiffon Cake 6'",
                'price'=>120.00,
                'image'=>'products/3.jpg',
                'quantity'=>1
            ],
            [
                'id'=>4,
                'name'=>"Birthday Cake 6'",
                'price'=>400.00,
                'image'=>'products/4.jpg',
                'quantity'=>1
            ],
            [
                'id'=>5,
                'name'=>"Birthday Cake 8'",
                'price'=>500.00,
                'image'=>'products/5.jpg',
                'quantity'=>1
            ],
            [
                'id'=>6,
                'name'=>"Birthday Cake 8'",
                'price'=>500.00,
                'image'=>'products/6.png',
                'quantity'=>1
            ],
            [
                'id'=>7,
                'name'=>"Birthday Cake 8'",
                'price'=>500.00,
                'image'=>'products/7.png',
                'quantity'=>1
            ],
            [
                'id'=>8,
                'name'=>'Sofia the First 2 Layer',
                'price'=> 1500.00,
                'image'=>'products/8.jpg',
                'quantity'=>1
            ],
            [
                'id'=>9,
                'name'=>'Spiderman 2 Layer',
                'price'=> 1500.00,
                'image'=>'products/9.png',
                'quantity'=>1
            ],
            [
                'id'=>10,
                'name'=>'The Little Mermaid',
                'price'=> 1500.00,
                'image'=>'products/10.jpg',
                'quantity'=>1
            ],
            [
                'id'=>11,
                'name'=>'Custom Cake',
                'price'=> 200,
                'image'=>'products/11.jpg',
                'quantity'=>1
            ],

        ]);
    }
}