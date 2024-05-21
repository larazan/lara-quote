<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article;
// use App\Notifications\PostArticleToTwitter as PostArticleToTwitterNotification;
use Illuminate\Notifications\AnonymousNotifiable;

class PostArticleToTwitter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quo:post-article-to-twitter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Posts the latest unshared article to Twitter';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(AnonymousNotifiable $notifiable)
    {
        // return Command::SUCCESS;
        $article = Article::orderBy('submitted_at', 'asc')
                            ->first();
        // $notifiable->notify(new PostArticleToTwitterNotification($article));
    }
}
