<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $stores = Store::all();
        for ($i = 0; $i < 20; $i++) {
            $faker = Faker::create();
            Product::create(attributes: [
                "store_id" => $faker->randomElement($stores)->id,
                "name" => $faker->name,
                "description" => $faker->text,
                "price" => $faker->randomFloat(2, 0, 100)
            ]);
        }
    }
}
