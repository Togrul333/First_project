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
        $pages=['Hakkimizda','Karyer','Vizyonumuz','Misyonumuz'];
        $count=0;
        foreach ($pages as $page){
            $count++;
            DB::table('pages')->insert([
                'title'=>$page,
                'slug'=>$page,
                'image'=>'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.logaster.ru%2Fblog%2Fbusiness-ideas%2F&psig=AOvVaw1w2npZfByOq1qcJwNt7jRR&ust=1618732958551000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCMDJvKrohPACFQAAAAAdAAAAABAD',
                'content'=>'lorem wedrsfdfdsgds gfsdgds eg gsdg g gf',
                'order'=>$count,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
