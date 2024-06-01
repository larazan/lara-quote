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
            ['name' => 'Work', 'slug' => 'work', 'created_at' => Carbon::now()],
            ['name' => 'People', 'slug' => 'people', 'created_at' => Carbon::now()], 
            ['name' => 'Life', 'slug' => 'life', 'created_at' => Carbon::now()], 
            ['name' => 'Time', 'slug' => 'time', 'created_at' => Carbon::now()], 
            ['name' => 'Human', 'slug' => 'human', 'created_at' => Carbon::now()], 
            ['name' => 'Mind', 'slug' => 'mind', 'created_at' => Carbon::now()], 
            ['name' => 'Heart', 'slug' => 'heart', 'created_at' => Carbon::now()], 
            ['name' => 'Fear', 'slug' => 'fear', 'created_at' => Carbon::now()], 
            ['name' => 'Act', 'slug' => 'act', 'created_at' => Carbon::now()], 
            ['name' => 'World', 'slug' => 'world', 'created_at' => Carbon::now()], 
            ['name' => 'Suffer', 'slug' => 'suffer', 'created_at' => Carbon::now()], 
            ['name' => 'Respect', 'slug' => 'respect', 'created_at' => Carbon::now()], 
            ['name' => 'Good', 'slug' => 'good', 'created_at' => Carbon::now()], 
            ['name' => 'Bad', 'slug' => 'bad', 'created_at' => Carbon::now()], 
            ['name' => 'Patience', 'slug' => 'patience', 'created_at' => Carbon::now()], 
            ['name' => 'History', 'slug' => 'history', 'created_at' => Carbon::now()], 
            ['name' => 'Change', 'slug' => 'change', 'created_at' => Carbon::now()], 
            ['name' => 'Power', 'slug' => 'power', 'created_at' => Carbon::now()], 
            ['name' => 'Moment', 'slug' => 'moment', 'created_at' => Carbon::now()], 
            ['name' => 'Choices', 'slug' => 'Choices', 'created_at' => Carbon::now()], 
            ['name' => 'Way', 'slug' => 'way', 'created_at' => Carbon::now()], 
            ['name' => 'Support', 'slug' => 'support', 'created_at' => Carbon::now()], 
            ['name' => 'Peace', 'slug' => 'peace', 'created_at' => Carbon::now()], 
            ['name' => 'Active', 'slug' => 'active', 'created_at' => Carbon::now()], 
            ['name' => 'Family', 'slug' => 'family', 'created_at' => Carbon::now()], 
            ['name' => 'Faith', 'slug' => 'faith', 'created_at' => Carbon::now()], 
            ['name' => 'Great', 'slug' => 'great', 'created_at' => Carbon::now()], 
            ['name' => 'Fight', 'slug' => 'fight', 'created_at' => Carbon::now()], 
            ['name' => 'Development', 'slug' => 'development', 'created_at' => Carbon::now()], 
            ['name' => 'Growth', 'slug' => 'growth', 'created_at' => Carbon::now()], 
            ['name' => 'Poverty', 'slug' => 'poverty', 'created_at' => Carbon::now()], 
            ['name' => 'Need', 'slug' => 'need', 'created_at' => Carbon::now()], 
            ['name' => 'Help', 'slug' => 'help', 'created_at' => Carbon::now()], 
            ['name' => 'Fun', 'slug' => 'fun', 'created_at' => Carbon::now()], 
            ['name' => 'Hope', 'slug' => 'hope', 'created_at' => Carbon::now()], 
            ['name' => 'Focus', 'slug' => 'focus', 'created_at' => Carbon::now()], 
            ['name' => 'Goals', 'slug' => 'goals', 'created_at' => Carbon::now()], 
            ['name' => 'Spirit', 'slug' => 'spirit', 'created_at' => Carbon::now()], 
            ['name' => 'Believe', 'slug' => 'believe', 'created_at' => Carbon::now()], 
            ['name' => 'Live', 'slug' => 'live', 'created_at' => Carbon::now()], 
            ['name' => 'Harmony', 'slug' => 'harmony', 'created_at' => Carbon::now()], 
            ['name' => 'Free', 'slug' => 'free', 'created_at' => Carbon::now()], 
            ['name' => 'Will', 'slug' => 'will', 'created_at' => Carbon::now()], 
            ['name' => 'Result', 'slug' => 'result', 'created_at' => Carbon::now()], 
            ['name' => 'Solution', 'slug' => 'solution', 'created_at' => Carbon::now()], 
            ['name' => 'Grow', 'slug' => 'grow', 'created_at' => Carbon::now()], 
            ['name' => 'Lost', 'slug' => 'lost', 'created_at' => Carbon::now()], 
            ['name' => 'Future', 'slug' => 'future', 'created_at' => Carbon::now()], 
            ['name' => 'Happens', 'slug' => 'happens', 'created_at' => Carbon::now()], 
            ['name' => 'Crazy', 'slug' => 'crazy', 'created_at' => Carbon::now()], 
            ['name' => 'Mystery', 'slug' => 'mystery', 'created_at' => Carbon::now()], 
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
