<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $articles = Article::all()->random(100);
        $likes = [];

        foreach ($articles as $article) {
            foreach ($users->random(rand(1, 10)) as $user) {
                $likes[] = [
                    'likeable_id' => $article->id,
                    'likeable_type' => 'articles',
                    'user_id' => $user->id,
                ];
            }
        }

        DB::table('likes')->insert($likes);
    }
}
