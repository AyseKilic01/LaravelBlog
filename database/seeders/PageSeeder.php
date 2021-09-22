<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $pages = ['Hakkımda', 'İletişim'];
        $count = 0;
        foreach ($pages as $page) {
            $count++;
            DB::table('pages')->insert([
                'title' => $page,
                'slug' => Str::slug($page),
                'content'=>$faker->paragraph(30),
                'order'=>$count,
                'image'=>$faker->imageUrl(700, 300, 'cats', true, 'My Laravel Blog', true),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
