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
        $persons = Person::all();
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

    public function show($id)
    {
        $person = Person::find($id);
        $authorId = $person->author_id;
        $quotes = Quote::where('author_id', $authorId);

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
        $person = Person::select(['id', 'name', 'slug', 'author_id', 'bio'])
                        ->where('name', 'like', "%{$letter}%");

        // $person = Person::where('name', 'like', "%{$letter}%")->get();
                        
        if ($person) {
            
            return response()->json([
                'status' => 200,
                'person' => $person,
            ], 200);

        } else {
            
            return response()->json([
                'status' => 404,
                'message' => 'No record found',
            ], 404);

        }
    }
}
