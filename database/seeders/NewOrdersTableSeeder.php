<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Orders;
use App\Models\Products;



class NewOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Buat produk jika belum ada
        $product1 = Products::firstOrCreate([
            "name" => 'Xiaomi Redmi Note 8',
            "price" => 3800000,
            "stock" => 10,
            "sold" => 17,
        ]);

        $product2 = Products::firstOrCreate([
            "name" => 'Xiaomi Redmi Note 8 Pro',
            "price" => 4100000,
            "stock" => 4,
            "sold" => 29,
        ]);

        // Buat order
        $order = Orders::create([
            "id" => 1,
        ]);

        // Kaitkan produk dengan order dan tambahkan quantity
        $order->products()->attach([
            $product1->id => ['quantity' => 2],
            $product2->id => ['quantity' => 3],
        ]);

    }
}
