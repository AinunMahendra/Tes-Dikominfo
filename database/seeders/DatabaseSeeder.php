<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Products;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Products::create([
        //     "name" => 'Xiaomi Redmi Note 8',
        //     "price" => 3800000,
        //     "stock" => 10,
        //     "sold" => 17,
        // ]);
        // Products::create([
        //     "name" => 'Xiaomi Redmi Note 8 Pro',
        //     "price" => 4100000,
        //     "stock" => 4,
        //     "sold" => 29,
        // ]);
        Products::create([
            "name" => 'Xiaomi Redmi Note 9',
            "price" => 4499000,
            "stock" => 19,
            "sold" => 37,
        ]);
        Products::create([
            "name" => 'Xiaomi Redmi Note 9 Pro',
            "price" => 5199000,
            "stock" => 18,
            "sold" => 5,
        ]);
        Products::create([
            "name" => 'Xiaomi Redmi Note 13',
            "price" => 13000000,
            "stock" => 3,
            "sold" => 19,
        ]);
        Products::create([
            "name" => 'Xiaomi Redmi Note 13T',
            "price" => 6599000,
            "stock" => 0,
            "sold" => 40,
        ]);

    }
}


