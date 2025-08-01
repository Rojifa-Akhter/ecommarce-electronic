<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Category::create([
            'name' => 'Electronics',
            'image' => 'default_image.png',
            'description' => 'Electronic items and gadgets',
        ]);

        Category::create([
            'name' => 'Fashion',
            'image' => 'default_image.png',
            'description' => 'Clothing and fashion accessories',
        ]);
    }
}
