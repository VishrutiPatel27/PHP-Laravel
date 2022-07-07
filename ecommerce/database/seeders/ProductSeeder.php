<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                    'name' => 'iphone x',
                    'price' => '20000',
                    'description' => 'A smartsphone with 16gb ram and much more feature',
                    'category' => 'moblie',
                    'gallery' => 'D:\OneDrive - Krish Compusoft Services Pvt Ltd\Desktop\iphonex.jpg'
                ],
                [
                    'name' => 'iphone 11',
                    'price' => '25000',
                    'description' => 'A smartsphone with 64gb ram and much more feature',
                    'category' => 'moblie',
                    'gallery' => 'https://www.apple.com/in/shop/buy-iphone/iphone-11/6.1-inch-display-64gb-green'
                ],
                [
                    'name' => 'iphone 12',
                    'price' => '30000',
                    'description' => 'A smartsphone with 128gb ram and much more feature',
                    'category' => 'moblie',
                    'gallery' => 'https://www.apple.com/in/shop/buy-iphone/iphone-12/6.1-inch-display-256gb-purple'
                ],
                [
                    'name' => 'iphone 13',
                    'price' => '40000',
                    'description' => 'A smartsphone with 256gb ram and much more feature',
                    'category' => 'moblie',
                    'gallery' => 'https://www.amazon.in/Apple-iPhone-13-128GB-Blue/dp/B09G9BL5CP'
                ],
                [
                    'name' => 'Apple watch series 7',
                    'price' => '40000',
                    'description' => 'This Apple Watch Series 7 is a unique combination of style and functionality that keeps you ahead of time with its unique features.',
                    'category' => 'watch',
                    'gallery' => 'https://www.gadgetsnow.com/smartwatch/Apple-Watch-Series-7'
                ]
            
        ]);
    }
}
