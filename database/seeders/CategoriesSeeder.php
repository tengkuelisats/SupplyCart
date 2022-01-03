<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'category' => 'Perfume',
        ]);

        Category::create([
            'category' => 'Fashion',
        ]);

        Category::create([
            'category' => 'Cat Food',
        ]);

        Category::create([
            'category' => 'Candles',
        ]);
    }
}
