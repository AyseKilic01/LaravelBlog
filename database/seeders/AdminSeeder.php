<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name'=>'Ayşe Kılıç',
            'mail'=>'ayse.klc.95@gmail.com',
            'password'=>bcrypt('1234'),
        ]);
    }
}
