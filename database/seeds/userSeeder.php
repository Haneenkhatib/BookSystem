<?php

use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach (range(0, 3) as $index) {
            $image = $faker->image(public_path('image'));
            $image = str_replace(public_path(), '', $image);
            \App\User::create([
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'username' => $faker->userName,
                'password' => \Illuminate\Support\Facades\Hash::make(12345),
                'enabled' => $faker->randomElement(['0', '1']),
                'image' => $image
            ]);
        }
    }
}
