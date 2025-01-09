<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Writer;
use App\Models\Article;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Category::factory(2)->create();
        Writer::factory(5)->create();
        Article::factory(10)->create();
    }
}
