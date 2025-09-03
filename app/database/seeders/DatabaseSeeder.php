<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Создаем пользователей
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Создаем родительские и дочерние категории
        $laptops = Category::factory()->create([
            'name' => "Ноутбуки",
            'description' => "Ноутбуки для работы и учебы",
            'parent_id' => null,
        ]);

        $smartphones = Category::factory()->create([
            'name' => "Смартфоны",
            'description' => "Современные мобильные телефоны и аксессуары",
            'parent_id' => null,
        ]);

        $tablets = Category::factory()->create([
            'name' => "Планшеты",
            'description' => "Планшетные компьютеры и аксессуары",
            'parent_id' => null,
        ]);
        
        $headphones = Category::factory()->create([
            'name' => "Наушники",
            'description' => "Различные типы наушников для прослушивания музыки",
            'parent_id' => null,
        ]);

        $televisions = Category::factory()->create([
            'name' => "Телевизоры",
            'description' => "Современные телевизоры и домашние кинотеатры",
            'parent_id' => null,
        ]);

        $accessories = Category::factory()->create([
            'name' => "Аксессуары",
            'description' => "Аксессуары для электроники",
            'parent_id' => null,
        ]);
        
        
        $android = Category::factory()->create([
            'name' => "Android",
            'description' => "Смартфоны на базе ОС Android",
            'parent_id' => $smartphones->id,
        ]);

        $ios = Category::factory()->create([
            'name' => "iOS",
            'description' => "Смартфоны на базе iOS",
            'parent_id' => $smartphones->id,
        ]);
        
        $wireless_headphones = Category::factory()->create([
            'name' => "Беспроводные",
            'description' => "Беспроводные наушники",
            'parent_id' => $headphones->id,
        ]);

        $wired_headphones = Category::factory()->create([
            'name' => "Проводные",
            'description' => "Проводные наушники",
            'parent_id' => $headphones->id,
        ]);

        Category::factory()->create([
            'name' => "Кейсы и чехлы",
            'description' => "Аксессуары для планшетов и смартфонов",
            'parent_id' => $accessories->id,
        ]);

        // Создаем кастомные товары и прикрепляем их к категориям
        $iphone = Product::factory()->create([
            'name' => "iPhone 15 Pro",
            'is_available' => true,
            'price' => 3000.00,
            'rating' => 4.5,
        ]);
        $iphone->categories()->attach([$smartphones->id, $ios->id]);

        $samsung = Product::factory()->create([
            'name' => "Samsung Galaxy S23",
            'is_available' => true,
            'price' => 2300.00,
            'rating' => 5.0,
        ]);
        $samsung->categories()->attach([$smartphones->id, $android->id]);

        $macbook = Product::factory()->create([
            'name' => 'MacBook Air M2',
            'is_available' => true,
            'price' => 2500.00,
            'rating' => 4.8,
        ]);
        $macbook->categories()->attach([$laptops->id]);

        $sony_headphones = Product::factory()->create([
            'name' => 'Sony WH-1000XM5',
            'is_available' => true,
            'price' => 400.00,
            'rating' => 4.9,
        ]);
        $sony_headphones->categories()->attach([$headphones->id, $wireless_headphones->id]);

        $lg_tv = Product::factory()->create([
            'name' => 'LG OLED C2',
            'is_available' => true,
            'price' => 1500.00,
            'rating' => 4.7,
        ]);
        $lg_tv->categories()->attach([$televisions->id]);
    }
}
