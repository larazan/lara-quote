<?php

namespace App\Http\Controllers\Api;

use App\Models\Quote;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class QuoteController extends Controller
{
    //
    public function index()
    {
        $quotes = Quote::paginate(request()->all());  
        if ($quotes->count() > 0) {
            
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

    public function show($id)
    {
        $quote = Quote::find($id);
        if ($quote) {
            
            return response()->json([
                'status' => 200,
                'quote' => $quote,
            ], 200);

        } else {
            
            return response()->json([
                'status' => 404,
                'message' => 'No record found',
            ], 404);

        }
    }

    public function showByTag($tag)
    {
        
    }
}