<?php

use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\Factory::create();
        foreach (range(0,50) as $index){
            $image=$faker->image(public_path('image'));
            $image=str_replace(public_path(),'',$image);
            \App\Category::create([
                'name'=>$faker->name,
                'lang'=>$faker->randomElement(['ar','en']),
                'image'=>$image
            ]);
        }    }
}
