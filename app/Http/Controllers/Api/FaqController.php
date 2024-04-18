<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
    public function index()
    {
        $faqs = Faq::all();
        if ($faqs->count() > 0) {
            
            return response()->json([
                'status' => 200,
                'faqs' => $faqs,
            ], 200);

        } else {
            
            return response()->json([
                'status' => 404,
                'message' => 'No records found',
            ], 404);

        }
    }
}
