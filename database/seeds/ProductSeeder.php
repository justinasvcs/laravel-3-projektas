<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
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
            $products[$i] = [
                'title'   => $faker->sentence(2),
                'price'   => $faker->numberBetween(1, 100),
                'count'   => $faker->numberBetween(10, 30),
                'photo_path'  => $faker->imageUrl()
            ];
        }

        DB::table('products')
          ->insert($products); // TODO: eloquent model vietoj DB query
    }
}
