<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Article;
use Carbon\Carbon;
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
            ['name' => 'Love', 'slug' => 'love', 'created_at' => Carbon::now()],
            ['name' => 'War', 'slug' => 'war', 'created_at' => Carbon::now()],
            ['name' => 'Rich', 'slug' => 'rich', 'created_at' => Carbon::now()],
            ['name' => 'Happy', 'slug' => 'happy', 'created_at' => Carbon::now()],
            ['name' => 'Emotion', 'slug' => 'emotion', 'created_at' => Carbon::now()],
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
