<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            // Основные категории (обновленные названия)
            ['id' => 1, 'title' => 'Footwear', 'slug' => 'footwear', 'parent_id' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'title' => 'Denim Wear', 'slug' => 'denim-wear', 'parent_id' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'title' => 'Activewear', 'slug' => 'activewear', 'parent_id' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'title' => 'Outerwear', 'slug' => 'outerwear', 'parent_id' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'title' => 'Tops & Shirts', 'slug' => 'tops-shirts', 'parent_id' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'title' => 'Accessories', 'slug' => 'accessories', 'parent_id' => 0, 'created_at' => now(), 'updated_at' => now()],
            
            // Подкатегории для Activewear
            ['id' => 7, 'title' => 'Men\'s Activewear', 'slug' => 'mens-activewear', 'parent_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'title' => 'Women\'s Activewear', 'slug' => 'womens-activewear', 'parent_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            
            // Подкатегории для Footwear
            ['id' => 9, 'title' => 'Sneakers', 'slug' => 'sneakers', 'parent_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'title' => 'Boots', 'slug' => 'boots', 'parent_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'title' => 'Sandals', 'slug' => 'sandals', 'parent_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            
            // Подкатегории для Accessories
            ['id' => 12, 'title' => 'Bags & Backpacks', 'slug' => 'bags-backpacks', 'parent_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'title' => 'Watches', 'slug' => 'watches', 'parent_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'title' => 'Sunglasses', 'slug' => 'sunglasses', 'parent_id' => 6, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}