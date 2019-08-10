<?php

use Illuminate\Database\Seeder;

class videoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker= Faker\Factory::create();
       foreach (range(0,20) as $index){
           \App\Video::create([
               'name'=>$faker->firstName,
               'url'=>$faker->url,
               'description'=>$faker->name,
               ]);
       }
    }
}
