<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(request()->all());
        if ($articles->count() > 0) {
            
            return response()->json([
                'status' => 200,
                'articles' => $articles,
            ], 200);

        } else {
            
            return response()->json([
                'status' => 404,
                'message' => 'No records found',
            ], 404);

        }
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        if ($article) {
            
            return response()->json([
                'status' => 200,
                'article' => $article,
            ], 200);

        } else {
            
            return response()->json([
                'status' => 404,
                'message' => 'No record found',
            ], 404);

        }
    }
}
