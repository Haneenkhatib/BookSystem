<?php

use Illuminate\Database\Seeder;

class librarySeeder extends Seeder
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
            \App\Library::create([
                'name'=>$faker->name,
                'phone'=>$faker->phoneNumber,
                'email'=>$faker->email,
                'fax'=>$faker->phoneNumber,
                'address'=>$faker->address,
                'lang'=>$faker->randomElement(['ar','en']),
                'image'=>$image
            ]);
        }
    }
}
