<?php

use Illuminate\Database\Seeder;

class TwittTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('Tweet')->insert([
            'title' => $faker->sentence($nbWords = 4, $variableNbWords = true),
            'text' => $faker->sentence($nbWords = 10, $variableNbWords = true),
            'author' => $faker->firstName. " ". $faker->lastName,
        ]);
    }
}
