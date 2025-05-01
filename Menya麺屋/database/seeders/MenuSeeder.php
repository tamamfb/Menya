<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\MenuType;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $ramenType = MenuType::where('name', 'Ramen')->first();
        $sushiType = MenuType::where('name', 'Sushi')->first();
        $beverageType = MenuType::where('name', 'Beverages')->first();

        // Ramen
        Menu::create([
            'name' => 'Chicken Sashu Ramen',
            'description' => 'Tender chicken sashu slices atop a rich soy-based broth with perfectly cooked ramen noodles and soft-boiled egg.',
            'stock' => 20,
            'price' => 58000,
            'menu_type_id' => $ramenType->id,
        ]);

        Menu::create([
            'name' => 'Chicken Karage Ramen',
            'description' => 'Golden crispy chicken karaage served on a bed of warm ramen in a savory broth, garnished with scallions and nori.',
            'stock' => 20,
            'price' => 60000,
            'menu_type_id' => $ramenType->id,
        ]);

        Menu::create([
            'name' => 'Chicken Katsu Ramen',
            'description' => 'Juicy chicken katsu paired with creamy miso ramen broth and fresh vegetables for a hearty meal.',
            'stock' => 20,
            'price' => 62000,
            'menu_type_id' => $ramenType->id,
        ]);

        Menu::create([
            'name' => 'Dumpling Ramen',
            'description' => 'Flavor-packed dumplings floating in our house special broth, served with chewy ramen noodles and greens.',
            'stock' => 20,
            'price' => 59000,
            'menu_type_id' => $ramenType->id,
        ]);

        Menu::create([
            'name' => 'Ebi Furai Ramen',
            'description' => 'Crispy fried shrimp laid over a seafood ramen base with hints of garlic and spice.',
            'stock' => 15,
            'price' => 68000,
            'menu_type_id' => $ramenType->id,
        ]);

        Menu::create([
            'name' => 'Gyoza Hokaido Ramen',
            'description' => 'Hokkaido-style ramen topped with succulent gyoza dumplings, corn, and butter in a miso-based broth.',
            'stock' => 18,
            'price' => 64000,
            'menu_type_id' => $ramenType->id,
        ]);

        Menu::create([
            'name' => 'Beef Crazy Ramen',
            'description' => 'Loaded with slices of marinated beef and chili oil for a bold, spicy ramen experience.',
            'stock' => 20,
            'price' => 67000,
            'menu_type_id' => $ramenType->id,
        ]);

        Menu::create([
            'name' => 'Chicken Soya Ramen',
            'description' => 'Soy-glazed grilled chicken served in a light soy broth with seasonal vegetables and ramen.',
            'stock' => 20,
            'price' => 59000,
            'menu_type_id' => $ramenType->id,
        ]);

        // Sushi
        Menu::create([
            'name' => 'Tuna Tartar Roll',
            'description' => 'Fresh tuna tartar wrapped with sushi rice and seaweed, topped with sesame oil and avocado.',
            'stock' => 20,
            'price' => 42000,
            'menu_type_id' => $sushiType->id,
        ]);

        Menu::create([
            'name' => 'Volcano Egg Roll',
            'description' => 'A fiery sushi roll bursting with spicy tuna, avocado, and topped with a creamy egg lava.',
            'stock' => 20,
            'price' => 45000,
            'menu_type_id' => $sushiType->id,
        ]);

        Menu::create([
            'name' => 'Unagi Shrimp Roll',
            'description' => 'Delicate shrimp and unagi (eel) combo sushi roll drizzled with sweet eel sauce.',
            'stock' => 15,
            'price' => 48000,
            'menu_type_id' => $sushiType->id,
        ]);

        Menu::create([
            'name' => 'Unagi Dragon Roll',
            'description' => 'Rich unagi rolled with avocado and cucumber, topped with a dragon-like unagi slice.',
            'stock' => 15,
            'price' => 52000,
            'menu_type_id' => $sushiType->id,
        ]);

        Menu::create([
            'name' => 'Top Gun Roll',
            'description' => 'A bold sushi creation with spicy salmon, tempura flakes, and a hint of wasabi mayo.',
            'stock' => 20,
            'price' => 46000,
            'menu_type_id' => $sushiType->id,
        ]);

        Menu::create([
            'name' => 'Salmon Mayo Roll',
            'description' => 'Smooth salmon paired with creamy Japanese mayo for a rich and satisfying roll.',
            'stock' => 20,
            'price' => 43000,
            'menu_type_id' => $sushiType->id,
        ]);

        Menu::create([
            'name' => 'Spicy Chicken Roll',
            'description' => 'Crispy chicken roll with a spicy sauce kick, ideal for spice lovers.',
            'stock' => 20,
            'price' => 44000,
            'menu_type_id' => $sushiType->id,
        ]);

        Menu::create([
            'name' => 'Sweet Namazu Roll',
            'description' => 'Unique roll featuring sweet catfish (namazu) paired with a honey glaze.',
            'stock' => 10,
            'price' => 47000,
            'menu_type_id' => $sushiType->id,
        ]);

        Menu::create([
            'name' => 'Salmon Cheese Roll',
            'description' => 'Melted cheese over premium salmon, a roll that’s both creamy and savory.',
            'stock' => 20,
            'price' => 49000,
            'menu_type_id' => $sushiType->id,
        ]);

        Menu::create([
            'name' => 'Katsu Spicy Roll',
            'description' => 'Chicken katsu sushi roll with a spicy twist, served with house sauce.',
            'stock' => 20,
            'price' => 45000,
            'menu_type_id' => $sushiType->id,
        ]);

        Menu::create([
            'name' => 'Dori Cheese Roll',
            'description' => 'Crispy dory fish roll layered with cheese and a touch of lemon.',
            'stock' => 20,
            'price' => 46000,
            'menu_type_id' => $sushiType->id,
        ]);

        Menu::create([
            'name' => 'California Roll',
            'description' => 'Classic California roll made with crab stick, avocado, and cucumber – a sushi staple.',
            'stock' => 25,
            'price' => 40000,
            'menu_type_id' => $sushiType->id,
        ]);

        // Beverages
        Menu::create([
            'name' => 'Mineral Water',
            'description' => 'Pure and refreshing mineral water to cleanse your palate.',
            'stock' => 50,
            'price' => 8000,
            'menu_type_id' => $beverageType->id,
        ]);

        Menu::create([
            'name' => 'Ocha',
            'description' => 'Traditional Japanese green tea served hot or cold for a relaxing drink.',
            'stock' => 40,
            'price' => 12000,
            'menu_type_id' => $beverageType->id,
        ]);

        Menu::create([
            'name' => 'Sunrise Mojito',
            'description' => 'A tropical mojito mix with citrus and mint, perfect for bright mornings.',
            'stock' => 30,
            'price' => 18000,
            'menu_type_id' => $beverageType->id,
        ]);

        Menu::create([
            'name' => 'Summer Mojito',
            'description' => 'Cool minty mojito infused with lime and a splash of soda, made for summer days.',
            'stock' => 30,
            'price' => 18000,
            'menu_type_id' => $beverageType->id,
        ]);

        Menu::create([
            'name' => 'Mango Tea',
            'description' => 'Sweet mango flavor blended with black tea, served chilled over ice.',
            'stock' => 35,
            'price' => 15000,
            'menu_type_id' => $beverageType->id,
        ]);

        Menu::create([
            'name' => 'Lychee Tea',
            'description' => 'Fragrant lychee infusion with a tea twist – light, fruity, and refreshing.',
            'stock' => 35,
            'price' => 15000,
            'menu_type_id' => $beverageType->id,
        ]);

        Menu::create([
            'name' => 'Lemonade',
            'description' => 'Fresh-squeezed lemonade with a perfect balance of sweet and tangy.',
            'stock' => 40,
            'price' => 14000,
            'menu_type_id' => $beverageType->id,
        ]);

        Menu::create([
            'name' => 'Lemon Tea',
            'description' => 'Iced tea with a citrusy lemon twist, ideal for cooling down.',
            'stock' => 40,
            'price' => 14000,
            'menu_type_id' => $beverageType->id,
        ]);
    }
}

