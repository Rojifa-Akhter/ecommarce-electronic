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
            'image' => '2.jpg',
            'description' => 'Electronic items and gadgets',
        ]);

        Category::create([
            'name' => 'Fashion',
            'image' => '2.jpg',
            'description' => 'Clothing and fashion accessories',
        ]);
    }
}
