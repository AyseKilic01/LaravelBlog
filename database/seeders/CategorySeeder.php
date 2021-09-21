<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorie = ['Eğlence','Bilişim', 'Gezi', 'Teknoloji'];
       foreach($categorie as $category){
        DB::table('categories')->insert([
            'name'=>$category,
            'slug'=>Str::slug($category),
            'created_at'=>now(),
            'updated_at'=>now(),
            ]);
       }
    }
}
