<?php

use Illuminate\Database\Seeder;

class requestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach (range(0, 50) as $index) {
            \App\Request::create([
                'book_amount' => $faker->randomDigit,
                'request_identifier' => str_random(6),
                'statues' => $faker->randomElement(['0', '1', '2']),
                'book_id' => $faker->numberBetween(3, 50),
                'user_id' => $faker->numberBetween(1, 50)
            ]);
        }
    }
}
