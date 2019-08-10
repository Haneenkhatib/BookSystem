<?php

use Illuminate\Database\Seeder;


class adminSeeder extends Seeder
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
            \App\Admin::create([
                'name' => $faker->name,
                'username' => $faker->userName,
                'password' => \Illuminate\Support\Facades\Hash::make('secret'),
                'email' => $faker->email,
                'phone' => $faker->phoneNumber
            ]);
        }
    }
}
