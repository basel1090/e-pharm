<?php

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Seeder;
use App\User;
use App\Models\Link;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use Spatie\Permission\Models\Role;
use App\Models\UserLink;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            $randomQuantity = random_int(3, 10);
            $randomPrice = random_int(10, 100);

            Order::firstOrCreate(['id' => $i], [
                'product_id' => Product::inRandomOrder()->first()->id,
                'user_id' => Product::inRandomOrder()->first()->id,
                'quantity' => $randomQuantity,
                'price' =>  $randomPrice,
                'total_price' => $randomQuantity * $randomPrice,
                'order_status_id' => OrderStatus::inRandomOrder()->first()->id,
            ]);
        }
    }
}
