<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $electronics = Category::where('name', 'Electronics')->first();
        $fashion = Category::where('name', 'Fashion')->first();

        Product::create([
            'category_id' => $electronics->id,
            'title' => 'Smartphone XYZ',
            'sku' => 'SMXYZ123',
            'stock' => '50',
            'image' => ['1.jpeg', '3.jpeg'],
            'price' => 499.99,
            'description' => 'Latest smartphone with advanced features',
        ]);

        Product::create([
            'category_id' => $fashion->id,
            'title' => 'Men\'s Leather Jacket',
            'sku' => 'MJLEA456',
            'stock' => '20',
            'image' => ['1.jpeg', '3.jpeg'],
            'price' => 149.99,
            'description' => 'Stylish and warm leather jacket',
        ]);
    }
}
