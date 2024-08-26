<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Order;
use App\Models\Payment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create()->each(function ($user) {
            $orders = Order::factory(rand(1, 3))->create([
                'user_id' => $user->id,
            ]);
    
            foreach ($orders as $order) {
                Payment::factory()->count(rand(1, 3))->create([
                    'order_id' => $order->id,
                ]);
            }
        });
    }
}
