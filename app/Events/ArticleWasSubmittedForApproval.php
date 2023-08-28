<?php

namespace App\Events;

use App\Models\Article;
use Illuminate\Queue\SerializesModels;

class ArticleWasSubmittedForApproval
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(public Article $article)
    {
        //
    }
    
}
