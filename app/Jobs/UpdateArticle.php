<?php

namespace App\Jobs;

use App\Events\ArticleWasSubmittedForApproval;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateArticle implements ShouldQueue
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
        private Article $article,
        private string $title,
        private string $body,
        private bool $shouldBeSubmitted,
        array $options = []
    )
    {
        $this->originalUrl = $options['original_url'] ?? null;
        $this->tags = $options['tags'] ?? [];
    }

    public static function fromRequest(Article $article, ArticleRequest $request): self
    {
        return new static(
            $article,
            $request->title(),
            $request->body(),
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
        $this->article->update([
            'title' => $this->title,
            'body' => $this->body,
            'original_url' => $this->originalUrl,
            'slug' => $this->title,
        ]);

        if ($this->shouldUpdateSubmittedAt()) {
            $this->article->submitted_at = now();
            $this->article->save();

            event(new ArticleWasSubmittedForApproval($this->article));
        }

        $this->article->syncTags($this->tags);
    }

    private function shouldUpdateSubmittedAt(): bool
    {
        return $this->shouldBeSubmitted && $this->article->isNotSubmitted();
    }
}
