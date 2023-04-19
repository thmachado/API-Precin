<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->create([
            "name" => "Test Product",
            "category" => "Test Category",
            "price" => 300,
            "discount" => 500,
            "image" => "https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png",
            "url" => "https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png"
        ]);
    }
}