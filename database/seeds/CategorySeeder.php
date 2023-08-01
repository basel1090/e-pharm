<?php

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Seeder;
use App\User;
use App\Models\Link;
use App\Models\Product;
use Spatie\Permission\Models\Role;
use App\Models\UserLink;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            Category::firstOrCreate(['id' => $i], [
                'title' => 'category_title_' . $i,
                'published' => $i % 2 == 0,
            ]);
        }

        for ($i = 1; $i <= 100; $i++) {
            Brand::firstOrCreate(['id' => $i], [
                'title' => 'brand_title_' . $i,
            ]);
        }


        for ($i = 1; $i <= 100; $i++) {
            Product::firstOrCreate(['id' => $i], [
                'title' => 'prodcut ' . $i,
                'description' => 'prodcut ' . $i,
                'image' => 'ubeony77CyTTVaOl7BIvOXhdqcTpurOGwIYUXc1W.png',
                'old_price' => $i * 3 / 7 + $i,
                'new_price' => $i * 3 / 7 + $i - 5,
                'brand_id' => Brand::inRandomOrder()->first()->id,
                'category_id' => Category::inRandomOrder()->first()->id,
                'size' => $i,
                'active' => true,
            ]);
        }
    }
}
