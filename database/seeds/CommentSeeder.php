<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Movie\Api\Movie\Models\Movie;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $count = 5;

        for ($i = 0; $i < $count; $i++) {
            DB::table('comments')->insert([
                'email' => $faker->email,
                'movie_id' => Movie::first()->id,
                'user' => $faker->username,
                'comment' => $faker->sentence(30),
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
            ]);
        }
    }
}
