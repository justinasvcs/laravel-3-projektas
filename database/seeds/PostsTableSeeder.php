<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i <= 10; $i++) {
            $posts[$i] = [
                'title'   => $faker->sentence,
                'content' => $faker->text,
                'draft'   => $faker->boolean(50),
                'author'  => $faker->name
            ];
        }

        DB::table('posts')
          ->insert($posts);
    }
}
