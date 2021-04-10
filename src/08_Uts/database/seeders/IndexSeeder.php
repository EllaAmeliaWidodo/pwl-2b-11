<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class IndexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Judul 12345',
            'content' => 'Morbi accumsan ipsum velamso nec tellus roin ...',
            'image' => 'img/home-1.jpg',
            'user_id' => 1,
        ]);
    }
}
