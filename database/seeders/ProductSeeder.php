<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    private array $usedSlugs = [];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [];
        
        // 1. Footwear (ID 1) - 15 продуктов
        for ($i = 1; $i <= 15; $i++) {
            $price = rand(80, 300);
            $title = $this->generateFootwearTitle($i);
            $slug = $this->generateUniqueSlug($title);
            $products[] = [
                'title' => $title,
                'slug' => $slug,
                'category_id' => rand(0, 1) ? 1 : rand(9, 11),
                'price' => $price,
                'old_price' => rand(0, 1) ? round($price * 1.3) : 0,
                'excerpt' => fake()->sentence(10),
                'content' => fake()->paragraphs(4, true),
                'image' => 'assets/img/products/shoes_' . rand(1, 8) . '.jpg',
                'gallery' => $this->generateGallery('shoes'),
                'is_hit' => $i <= 5,
                'is_new' => $i > 5 && $i <= 10,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        
        // 2. Denim Wear (ID 2) - 12 продуктов
        for ($i = 1; $i <= 12; $i++) {
            $price = rand(50, 150);
            $title = $this->generateDenimTitle($i);
            $slug = $this->generateUniqueSlug($title);
            $products[] = [
                'title' => $title,
                'slug' => $slug,
                'category_id' => 2,
                'price' => $price,
                'old_price' => rand(0, 1) ? round($price * 1.25) : 0,
                'excerpt' => fake()->sentence(8),
                'content' => fake()->paragraphs(3, true),
                'image' => 'assets/img/products/jeans_' . rand(1, 6) . '.jpg',
                'gallery' => $this->generateGallery('jeans'),
                'is_hit' => $i <= 4,
                'is_new' => $i > 4 && $i <= 8,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        
        // 3. Activewear (ID 3, 7, 8) - 18 продуктов
        for ($i = 1; $i <= 18; $i++) {
            $price = rand(40, 120);
            $title = $this->generateActivewearTitle($i);
            $slug = $this->generateUniqueSlug($title);
            $categoryId = $this->getActivewearCategory($i);
            $products[] = [
                'title' => $title,
                'slug' => $slug,
                'category_id' => $categoryId,
                'price' => $price,
                'old_price' => rand(0, 1) ? round($price * 1.2) : 0,
                'excerpt' => fake()->sentence(9),
                'content' => fake()->paragraphs(4, true),
                'image' => 'assets/img/products/sport_' . rand(1, 7) . '.jpg',
                'gallery' => $this->generateGallery('sport'),
                'is_hit' => $i <= 6,
                'is_new' => $i > 6 && $i <= 12,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        
        // 4. Outerwear (ID 4) - 10 продуктов
        for ($i = 1; $i <= 10; $i++) {
            $price = rand(100, 400);
            $title = $this->generateOuterwearTitle($i);
            $slug = $this->generateUniqueSlug($title);
            $products[] = [
                'title' => $title,
                'slug' => $slug,
                'category_id' => 4,
                'price' => $price,
                'old_price' => rand(0, 1) ? round($price * 1.35) : 0,
                'excerpt' => fake()->sentence(11),
                'content' => fake()->paragraphs(5, true),
                'image' => 'assets/img/products/coat_' . rand(1, 5) . '.jpg',
                'gallery' => $this->generateGallery('coat'),
                'is_hit' => $i <= 3,
                'is_new' => $i > 3 && $i <= 7,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        
        // 5. Tops & Shirts (ID 5) - 15 продуктов
        for ($i = 1; $i <= 15; $i++) {
            $price = rand(30, 100);
            $title = $this->generateTopTitle($i);
            $slug = $this->generateUniqueSlug($title);
            $products[] = [
                'title' => $title,
                'slug' => $slug,
                'category_id' => 5,
                'price' => $price,
                'old_price' => rand(0, 1) ? round($price * 1.15) : 0,
                'excerpt' => fake()->sentence(7),
                'content' => fake()->paragraphs(3, true),
                'image' => 'assets/img/products/shirt_' . rand(1, 8) . '.jpg',
                'gallery' => $this->generateGallery('shirt'),
                'is_hit' => $i <= 5,
                'is_new' => $i > 5 && $i <= 10,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        
        // 6. Accessories (ID 6, 12, 13, 14) - 20 продуктов
        for ($i = 1; $i <= 20; $i++) {
            $price = rand(20, 200);
            $title = $this->generateAccessoryTitle($i);
            $slug = $this->generateUniqueSlug($title);
            $categoryId = $this->getAccessoryCategory($i);
            $products[] = [
                'title' => $title,
                'slug' => $slug,
                'category_id' => $categoryId,
                'price' => $price,
                'old_price' => rand(0, 1) ? round($price * 1.4) : 0,
                'excerpt' => fake()->sentence(6),
                'content' => fake()->paragraphs(2, true),
                'image' => 'assets/img/products/accessory_' . rand(1, 6) . '.jpg',
                'gallery' => $this->generateGallery('accessory'),
                'is_hit' => $i <= 8,
                'is_new' => $i > 8 && $i <= 16,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        
        // Вставляем все продукты
        DB::table('products')->insert($products);
    }
    
    /**
     * Генератор уникального slug
     */
    private function generateUniqueSlug(string $title): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 1;
        
        while (in_array($slug, $this->usedSlugs)) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }
        
        $this->usedSlugs[] = $slug;
        return $slug;
    }
    
    /**
     * Генератор названий для обуви
     */
    private function generateFootwearTitle($index): string
    {
        $types = ['Sneakers', 'Boots', 'Loafers', 'Oxfords', 'Sandals', 'Slip-ons', 'Running Shoes', 'Training Shoes'];
        $adjectives = ['Premium', 'Classic', 'Modern', 'Urban', 'Comfort', 'Elite', 'Pro', 'Lightweight'];
        $colors = ['Black', 'White', 'Navy', 'Gray', 'Brown', 'Tan', 'Olive'];
        
        return $adjectives[array_rand($adjectives)] . ' ' . 
               $types[array_rand($types)] . ' - ' . 
               $colors[array_rand($colors)] . ' ' . $index;
    }
    
    /**
     * Генератор названий для джинсов
     */
    private function generateDenimTitle($index): string
    {
        $fits = ['Slim Fit', 'Straight Fit', 'Skinny Fit', 'Relaxed Fit', 'Bootcut'];
        $washes = ['Dark Wash', 'Medium Wash', 'Light Wash', 'Distressed', 'Ripped'];
        $types = ['Jeans', 'Denim Pants', 'Denim Trousers', 'Jeans Pants'];
        
        return $fits[array_rand($fits)] . ' ' . 
               $types[array_rand($types)] . ' ' . 
               $washes[array_rand($washes)] . ' ' . $index;
    }
    
    /**
     * Генератор названий для активной одежды
     */
    private function generateActivewearTitle($index): string
    {
        $items = ['Training T-Shirt', 'Workout Shorts', 'Sports Bra', 'Leggings', 'Tank Top', 'Hoodie', 'Joggers'];
        $tech = ['Moisture-Wicking', 'Breathable', 'Compression', 'Quick-Dry', 'Stretch', 'Performance'];
        $gender = ['Men\'s', 'Women\'s', 'Unisex'];
        
        return $gender[array_rand($gender)] . ' ' . 
               $tech[array_rand($tech)] . ' ' . 
               $items[array_rand($items)] . ' ' . $index;
    }
    
    /**
     * Генератор названий для верхней одежды
     */
    private function generateOuterwearTitle($index): string
    {
        $types = ['Jacket', 'Coat', 'Parka', 'Blazer', 'Bomber', 'Windbreaker', 'Trench Coat'];
        $materials = ['Wool', 'Leather', 'Denim', 'Nylon', 'Polyester', 'Cotton Blend'];
        $styles = ['Classic', 'Modern', 'Vintage', 'Urban', 'Outdoor', 'Casual'];
        
        return $styles[array_rand($styles)] . ' ' . 
               $materials[array_rand($materials)] . ' ' . 
               $types[array_rand($types)] . ' ' . $index;
    }
    
    /**
     * Генератор названий для топов и рубашек
     */
    private function generateTopTitle($index): string
    {
        $types = ['T-Shirt', 'Polo Shirt', 'Button-Down', 'Henley', 'Long Sleeve', 'Short Sleeve'];
        $fabrics = ['Cotton', 'Linen', 'Modal', 'Jersey', 'Oxford', 'Flannel'];
        $styles = ['Basic', 'Classic', 'Casual', 'Business', 'Graphic', 'Striped'];
        
        return $styles[array_rand($styles)] . ' ' . 
               $fabrics[array_rand($fabrics)] . ' ' . 
               $types[array_rand($types)] . ' ' . $index;
    }
    
    /**
     * Генератор названий для аксессуаров
     */
    private function generateAccessoryTitle($index): string
    {
        $items = ['Backpack', 'Messenger Bag', 'Watch', 'Sunglasses', 'Belt', 'Wallet', 'Hat', 'Scarf'];
        $materials = ['Leather', 'Canvas', 'Metal', 'Acetate', 'Fabric', 'Silicone'];
        $styles = ['Classic', 'Modern', 'Vintage', 'Sport', 'Business', 'Casual'];
        
        return $styles[array_rand($styles)] . ' ' . 
               $materials[array_rand($materials)] . ' ' . 
               $items[array_rand($items)] . ' ' . $index;
    }
    
    /**
     * Выбор категории для активной одежды
     */
    private function getActivewearCategory($index): int
    {
        if ($index <= 6) return 7; // Men's Activewear
        if ($index <= 12) return 8; // Women's Activewear
        return 3; // Основная категория Activewear
    }
    
    /**
     * Выбор категории для аксессуаров
     */
    private function getAccessoryCategory($index): int
    {
        if ($index <= 5) return 12; // Bags & Backpacks
        if ($index <= 10) return 13; // Watches
        if ($index <= 15) return 14; // Sunglasses
        return 6; // Основная категория Accessories
    }
    
    /**
     * Генератор галереи изображений
     */
    private function generateGallery($type): ?string
    {
        $gallery = [];
        $count = rand(2, 5);
        
        for ($k = 0; $k < $count; $k++) {
            $gallery[] = 'assets/img/products/' . $type . '_' . rand(1, 8) . '.jpg';
        }
        
        return !empty($gallery) ? json_encode(array_unique($gallery)) : null;
    }
}