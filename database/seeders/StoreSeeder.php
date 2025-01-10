<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        /**
         * "name")->unique();
            $table->string("address");
            $table->string("phone");
         */
        for ($i = 0; $i < 5; $i++) {
            $faker = Faker::create();
            Store::create([
                "name" => $faker->company,
                "address" => $faker->address,
                "phone" => $faker->phoneNumber
            ]);
        }
    }
}
