<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Eglence', 'Bilisim', 'Gezi', 'Teknoloji', 'Saglik', 'Spor', 'Gunlik yasam'];
        foreach ($categories as $category) {

            DB::table('categories')->insert([
                'name'=>$category,
                'slug'=>$category.' slug',
                'created_at'=>now(),
                'updated_at'=>now()

            ]);
        }

    }
}
