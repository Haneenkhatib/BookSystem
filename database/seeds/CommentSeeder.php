<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
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
            \App\Comment::create([
                'comment' => $faker->name,
                'post_id'=>$faker->numberBetween(1,20),
            ]);
        }
    }
}
