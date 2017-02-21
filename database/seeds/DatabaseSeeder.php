<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            DB::table('posts')->insert([
                'title' => $faker->text(20),
                'body' => $faker->text(500),
                'slug' => $faker->company()
            ]);
        }
    }
}
