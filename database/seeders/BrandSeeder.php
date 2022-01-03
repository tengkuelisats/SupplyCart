<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'brand' => 'Bath & Body Works',
        ]);

        Brand::create([
            'brand' => 'Nena Hijabs',
        ]);

        Brand::create([
            'brand' => 'Royal Canin',
        ]);

        Brand::create([
            'brand' => 'Power Cat',
        ]);
    }
}
