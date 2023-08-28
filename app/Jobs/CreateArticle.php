<?php

namespace App\Jobs;

use App\Events\ArticleWasSubmittedForApproval;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateArticle implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $originalUrl;

    private $tags;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $title,
        private string $body,
        private User $author,
        private bool $shouldBeSubmitted,
        array $options = []
    )
    {
        $this->originalUrl = $options['original_url'] ?? null;
        $this->tags = $options['tags'] ?? [];
    }

    public static function fromRequest(ArticleRequest $request): self
    {
        return new static(
            $request->title(),
            $request->body(),
            $request->author(),
            $request->shouldBeSubmitted(),
            [
                'original_url' => $request->originalUrl(),
                'tags' => $request->tags(),
            ],
        );
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $article = new Article([
            'title' => $this->title,
            'body' => $this->body,
            'original_url' => $this->originalUrl,
            'slug' => $this->title,
            'submitted_at' => $this->shouldBeSubmitted ? now() : null,
        ]);
        $article->authoredBy($this->author);
        $article->syncTags($this->tags);

        if ($article->isAwaitingApproval()) {
            event(new ArticleWasSubmittedForApproval($article));
        }
    }
}
