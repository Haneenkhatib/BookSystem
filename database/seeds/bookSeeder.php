<?php

use Illuminate\Database\Seeder;

class bookSeeder extends Seeder
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
$image = $faker->image(public_path('image'));
$image = str_replace(public_path(), '', $image);
\App\Book::create([
'title' => $faker->title,
'author' => $faker->name,
'writer' => $faker->name,
'lang' => $faker->randomElement(['ar', 'en']),
'publisher' => $faker->userName,
'publish_date' => $faker->date,
'category_id'=>$faker->numberBetween(1,50),
'library_id'=>$faker->numberBetween(1,50),
'isbn' => $faker->isbn10(),
'image' => $image
]);
}
}
}
