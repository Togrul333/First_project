<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = ['Hakkimizda', 'Kariyer', 'Vizyonumuz', 'Misyonumuz','Iletisim'];
        $count = 0;
        foreach ($pages as $page) {
            $count++;
            DB::table('pages')->insert([
                'title' => $page,
                'slug' => $page . ' slug',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRL5_YZv_1qlNWw87e6g56OTw9R5C2sYm9ERg&usqp=CAU',
                'content' => 'lorem ipsum .................',
                'order' => $count,
                'created_at' => now(),
                'updated_at' => now()

            ]);
        }
    }
}
