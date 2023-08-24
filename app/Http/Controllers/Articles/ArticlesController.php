<?php

namespace App\Http\Controllers\Articles;

use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    //
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {

    }

    public function create(Request $request)
    {
        $tags = Tag::query();

        return view('articles.create', [
            'tags' => $tags->get(),
            'selectedTags' => old('tags', []),
        ]);
    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete(Request $request, Article $article)
    {

    }
}
