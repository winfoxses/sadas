<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Группы фильтров (обновленные названия)
        DB::table('filter_groups')->insert([
            ['id' => 1, 'title' => 'Color Palette'],
            ['id' => 2, 'title' => 'Clothing Size'],
            ['id' => 3, 'title' => 'Footwear Size'],
            ['id' => 4, 'title' => 'Material'],
            ['id' => 5, 'title' => 'Brand'],
        ]);

        // Связи категорий с группами фильтров
        DB::table('category_filters')->insert([
            // Footwear (1) и подкатегории
            ['category_id' => 1, 'filter_group_id' => 1],
            ['category_id' => 1, 'filter_group_id' => 3],
            ['category_id' => 1, 'filter_group_id' => 4],
            ['category_id' => 1, 'filter_group_id' => 5],
            ['category_id' => 9, 'filter_group_id' => 1],
            ['category_id' => 9, 'filter_group_id' => 3],
            ['category_id' => 9, 'filter_group_id' => 4],
            ['category_id' => 9, 'filter_group_id' => 5],
            
            // Denim Wear (2)
            ['category_id' => 2, 'filter_group_id' => 1],
            ['category_id' => 2, 'filter_group_id' => 2],
            ['category_id' => 2, 'filter_group_id' => 4],
            ['category_id' => 2, 'filter_group_id' => 5],
            
            // Activewear (3) и подкатегории
            ['category_id' => 3, 'filter_group_id' => 1],
            ['category_id' => 3, 'filter_group_id' => 2],
            ['category_id' => 3, 'filter_group_id' => 4],
            ['category_id' => 3, 'filter_group_id' => 5],
            ['category_id' => 7, 'filter_group_id' => 1],
            ['category_id' => 7, 'filter_group_id' => 2],
            ['category_id' => 8, 'filter_group_id' => 1],
            ['category_id' => 8, 'filter_group_id' => 2],
            
            // Outerwear (4)
            ['category_id' => 4, 'filter_group_id' => 1],
            ['category_id' => 4, 'filter_group_id' => 2],
            ['category_id' => 4, 'filter_group_id' => 4],
            
            // Tops & Shirts (5)
            ['category_id' => 5, 'filter_group_id' => 1],
            ['category_id' => 5, 'filter_group_id' => 2],
            ['category_id' => 5, 'filter_group_id' => 4],
            
            // Accessories (6) и подкатегории
            ['category_id' => 6, 'filter_group_id' => 1],
            ['category_id' => 6, 'filter_group_id' => 5],
            ['category_id' => 12, 'filter_group_id' => 1],
            ['category_id' => 12, 'filter_group_id' => 4],
            ['category_id' => 13, 'filter_group_id' => 1],
            ['category_id' => 13, 'filter_group_id' => 5],
        ]);

        // Конкретные фильтры
        DB::table('filters')->insert([
            // Color Palette (1)
            ['id' => 1, 'title' => 'Classic Black', 'filter_group_id' => 1],
            ['id' => 2, 'title' => 'Pure White', 'filter_group_id' => 1],
            ['id' => 3, 'title' => 'Navy Blue', 'filter_group_id' => 1],
            ['id' => 4, 'title' => 'Charcoal Gray', 'filter_group_id' => 1],
            ['id' => 5, 'title' => 'Burgundy', 'filter_group_id' => 1],
            ['id' => 6, 'title' => 'Olive Green', 'filter_group_id' => 1],
            ['id' => 7, 'title' => 'Camel', 'filter_group_id' => 1],
            
            // Clothing Size (2)
            ['id' => 8, 'title' => 'XS', 'filter_group_id' => 2],
            ['id' => 9, 'title' => 'S', 'filter_group_id' => 2],
            ['id' => 10, 'title' => 'M', 'filter_group_id' => 2],
            ['id' => 11, 'title' => 'L', 'filter_group_id' => 2],
            ['id' => 12, 'title' => 'XL', 'filter_group_id' => 2],
            ['id' => 13, 'title' => 'XXL', 'filter_group_id' => 2],
            
            // Footwear Size (3)
            ['id' => 14, 'title' => 'US 7 / EU 40', 'filter_group_id' => 3],
            ['id' => 15, 'title' => 'US 8 / EU 41', 'filter_group_id' => 3],
            ['id' => 16, 'title' => 'US 9 / EU 42', 'filter_group_id' => 3],
            ['id' => 17, 'title' => 'US 10 / EU 43', 'filter_group_id' => 3],
            ['id' => 18, 'title' => 'US 11 / EU 44', 'filter_group_id' => 3],
            ['id' => 19, 'title' => 'US 12 / EU 45', 'filter_group_id' => 3],
            
            // Material (4)
            ['id' => 20, 'title' => 'Premium Leather', 'filter_group_id' => 4],
            ['id' => 21, 'title' => 'Suede', 'filter_group_id' => 4],
            ['id' => 22, 'title' => 'Canvas', 'filter_group_id' => 4],
            ['id' => 23, 'title' => 'Denim', 'filter_group_id' => 4],
            ['id' => 24, 'title' => 'Cotton', 'filter_group_id' => 4],
            ['id' => 25, 'title' => 'Polyester', 'filter_group_id' => 4],
            ['id' => 26, 'title' => 'Wool Blend', 'filter_group_id' => 4],
            
            // Brand (5)
            ['id' => 27, 'title' => 'UrbanStyle', 'filter_group_id' => 5],
            ['id' => 28, 'title' => 'ActivePro', 'filter_group_id' => 5],
            ['id' => 29, 'title' => 'DenimCo', 'filter_group_id' => 5],
            ['id' => 30, 'title' => 'Outdoor Gear', 'filter_group_id' => 5],
            ['id' => 31, 'title' => 'Premium Basics', 'filter_group_id' => 5],
        ]);

        // Связи продуктов с фильтрами (примерные - нужно будет обновить после ProductSeeder)
        // Эти данные добавятся автоматически при запуске сидеров в правильном порядке
    }
}