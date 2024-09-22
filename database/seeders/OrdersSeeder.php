<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;
use App\Models\Orders;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Buat produk terlebih dahulu
        $product1 = Products::create([
            "name" => 'Xiaomi Redmi Note 8',
            "price" => 3800000,
            "stock" => 10,
            "sold" => 17,
        ]);

        $product2 = Products::create([
            "name" => 'Xiaomi Redmi Note 8 Pro',
            "price" => 4100000,
            "stock" => 4,
            "sold" => 29,
        ]);

        // Buat order
        $order = Orders::create([
            // Tambahkan data order sesuai kebutuhan
        ]);

        // Kaitkan produk dengan order dan tambahkan quantity
        $order->products()->attach([
            $product1->id => ['quantity' => 1], // Tambahkan quantity
            $product2->id => ['quantity' => 2], // Tambahkan quantity
        ]);
    }
}
