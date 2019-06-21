<?php

use Illuminate\Database\Seeder;
use App\Article;
class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=0; $i<20000; $i++) {
          Article::create([
            'title' => $faker->sentence(3),
            'body' => $faker->paragraph(12),
            'tags' => join(',', $faker->words(4))
          ]);
        }
    }
}
