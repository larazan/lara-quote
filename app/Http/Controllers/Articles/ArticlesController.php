<?php

namespace App\Http\Controllers\Articles;

use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
use App\Jobs\CreateArticle;
use App\Jobs\DeleteArticle;
use App\Jobs\UpdateArticle;
use App\Policies\ArticlePolicy;
use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ArticlesController extends Controller
{
    //
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {

    }

    public function show(Article $article)
    {
        $user = Auth::user();

        abort_unless(
            $article->isPublished() || ($user && ($article->isAuthoredBy($user) )),
            404,
        );

        $trendingArticles = Article::published()
            ->trending()
            ->whereKeyNot($article->id)
            ->limit(3)
            ->get();

        return view('articles.show', [
            'article' => $article,
            'trendingArticles' => $trendingArticles,
        ]);
    }

    public function create(Request $request)
    {
        $tags = Tag::query();

        return view('articles.create', [
            'tags' => $tags->get(),
            'selectedTags' => old('tags', []),
        ]);
    }

    public function store(ArticleRequest $request)
    {
        $this->dispatchSync(CreateArticle::fromRequest($request, $uuid = Str::uuid()));

        $article = Article::findByUuidOrFail($uuid);

        $this->success($request->shouldBeSubmitted() ? 'articles.submitted' : 'articles.created');

        return $request->wantsJson()
            ? ArticleResource::make($article)
            : redirect()->route('articles.show', $article->slug());
    }

    public function edit(Request $request, Article $article)
    {
        $this->authorize(ArticlePolicy::UPDATE, $article);

        $tags = Tag::query();

        if (! $request->user()->isAdmin()) {
            $tags = $tags->public();
        }

        return view('articles.edit', [
            'article' => $article,
            'tags' => $tags->get(),
            'selectedTags' => old('tags', $article->tags()->pluck('id')->toArray()),
        ]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $this->authorize(ArticlePolicy::UPDATE, $article);

        $wasNotPreviouslySubmitted = $article->isNotSubmitted();

        $this->dispatchSync(UpdateArticle::fromRequest($article, $request));

        $article = $article->fresh();

        if ($wasNotPreviouslySubmitted && $request->shouldBeSubmitted()) {
            $this->success('articles.submitted');
        } else {
            $this->success('articles.updated');
        }

        return $request->wantsJson()
            ? ArticleResource::make($article)
            : redirect()->route('articles.show', $article->slug());
    }

    public function delete(Request $request, Article $article)
    {
        $this->authorize(ArticlePolicy::DELETE, $article);

        $this->dispatchSync(new DeleteArticle($article));

        $this->success('articles.deleted');

        return $request->wantsJson()
            ? response()->json([], Response::HTTP_NO_CONTENT)
            : redirect()->route('articles');
    }
}
