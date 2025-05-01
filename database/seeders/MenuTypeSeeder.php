<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MenuType;
class MenuTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        MenuType::create(['name' => 'Ramen']);
        MenuType::create(['name' => 'Sushi']);
        MenuType::create(['name' => 'Beverages']);
    }

}
