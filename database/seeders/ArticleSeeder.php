<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 4; $i++) {
            DB::table('articles')->insert([
                'category_id' => rand(1, 7),
                'title' => $faker->title,
                'image' => $faker->imageUrl(800, 400, 'cats', true, 'Faker'),
                'content'=>$faker->text,
                'slug'=>$faker->title,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
