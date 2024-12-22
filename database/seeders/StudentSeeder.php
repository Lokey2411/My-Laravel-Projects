<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $classLevels = ["10", "11", "12"];
        $classTypes = ["A", "D", "C", "B"];
        $classNumbers = [1, 2, 3, 4, 5];
        for($i=0;$i<10;$i++){
            $faker = Faker::create();
            $studentClass = $faker->randomElement($classLevels).$faker->randomElement($classTypes).$faker->randomElement($classNumbers);
            Student::create([
                "name" => $faker->name,
                "email" => $faker->email,
                "phone" => $faker->phoneNumber,
                "student_class" => $studentClass,
                "mark" => $faker->numberBetween(0, 10)
            ]);
        }
    }
}
