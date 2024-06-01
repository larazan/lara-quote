<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Quote;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //
    public function index()
    {
        $tags = Tag::all();
        if ($tags->count() > 0) {
            
            return response()->json([
                'status' => 200,
                'tags' => $tags,
            ], 200);

        } else {
            
            return response()->json([
                'status' => 404,
                'message' => 'No records found',
            ], 404);

        }
    }

    public function showAll()
    {
        $quotes = Quote::select('tags')->get();

        if ($quotes) {
            
            return response()->json([
                'status' => 200,
                'quotes' => $quotes,
            ], 200);

        } else {
            
            return response()->json([
                'status' => 404,
                'message' => 'No records found',
            ], 404);

        }
    }
}
