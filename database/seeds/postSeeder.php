<?php

use Illuminate\Database\Seeder;

class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach (range(0, 20) as $index) {
            \App\Post::create([
                'title' => $faker->title,
                'content'=>$faker->name,

            ]);
        }
    }
}
