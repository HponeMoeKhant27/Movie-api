<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();

        $count = 20;

        for ($i = 0; $i < $count; $i++) {
            DB::table('movies')->insert([
                'title' => $faker->title,
                'summary' => $faker->sentence(30),
                'cover_image' =>  '',
                'generes' => $faker->randomElement(['Action', 'Adventure', 'Comedy','Drama', 'Horror', 'Science Fiction','Fantasy', 'Thriller', 'Romance','Animation']),
                'author' => $faker->name,
                'tags' => 'tag-' . $i,
                'imdb_rate' => $i,
                'pdf_download_link' => $faker->title.'pdf',
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
            ]);
        }
    }
}
