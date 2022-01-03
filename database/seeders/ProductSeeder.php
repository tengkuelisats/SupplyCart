<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'A Thousand Wishes',
            'brand_id' => 1,
            'category_id' => 1,
            'price' => 40.00
        ]);

        Product::create([
            'name' => 'Luna Cotton Shawl',
            'brand_id' => 2,
            'category_id' => 2,
            'price' => 70.50
        ]);

        Product::create([
            'name' => 'FELINE BREED NUTRITION BRITISH SHORT HAIR KITTEN 2kg',
            'brand_id' => 3,
            'category_id' => 3,
            'price' => 77.10
        ]);

        Product::create([
            'name' => 'Vanilla Sugar',
            'brand_id' => 1,
            'category_id' => 1,
            'price' => 40.00
        ]);

        Product::create([
            'name' => 'Fresh Ocean Tuna Cat Food 7KG',
            'brand_id' => 4,
            'category_id' => 3,
            'price' => 70.00
        ]);

        Product::create([
            'name' => 'Perfect Peony',
            'brand_id' => 1,
            'category_id' => 4,
            'price' => 140.00
        ]);
    }
}
