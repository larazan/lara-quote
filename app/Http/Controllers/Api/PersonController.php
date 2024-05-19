<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\Quote;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    //
    public function index()
    {
        $persons = Person::paginate(request()->all());
        if ($persons->count() > 0) {
            return response()->json([
                'status' => 200,
                'persons' => $persons,
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
        $person = Person::where('slug', $slug)->first();
        $authorId = $person->author_id;
        $quotes = Quote::where('author_id', $authorId)->get();

        if ($person) {
            
            return response()->json([
                'status' => 200,
                'person' => $person,
                'quotes' => $quotes,
            ], 200);

        } else {
            
            return response()->json([
                'status' => 404,
                'message' => 'No record found',
            ], 404);

        }
    }

    public function showByLetter($letter) 
    {
        $persons = Person::where('name', 'like', "{$letter}%")->paginate();
                        
        if ($persons) {
            return response()->json([
                'status' => 200,
                'persons' => $persons,
            ], 200);

        } else {
            
            return response()->json([
                'status' => 404,
                'message' => 'No record found',
            ], 404);

        }
    }
}
