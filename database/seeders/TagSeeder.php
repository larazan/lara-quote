<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            ['name' => 'Installation', 'slug' => 'installation'],
        ]);

        $tagIds = array_flip(Tag::all()->pluck('id')->toArray());
        $articles = Article::all();
        $taggables = [];

        foreach ($articles as $article) {
            foreach (array_rand($tagIds, 3) as $tagId) {
                $taggables[] = [
                    'taggable_id' => $article->id,
                    'taggable_type' => 'articles',
                    'tag_id' => $tagId,
                ];
            }
        }

        DB::table('taggables')->insert($taggables);
    }
}
