<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Blog::truncate();

        Blog::create([
            'title' => 'How to choose the right smartphone',
            'description' => 'Tips and tricks for selecting the best smartphone for your needs.',
            'image' => 'images/products/4.png',
        ]);

        Blog::create([
            'title' => 'Latest fashion trends in 2025',
            'description' => 'A sneak peek into the upcoming fashion trends of the year.',
            'image' => 'images/products/4.png',
        ]);
    }
}
