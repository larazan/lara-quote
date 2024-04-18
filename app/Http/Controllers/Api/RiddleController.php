<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Riddle;
use Illuminate\Http\Request;

class RiddleController extends Controller
{
    //
    public function index()
    {
        $riddles = Riddle::all();
        if ($riddles->count() > 0) {
            
            return response()->json([
                'status' => 200,
                'riddles' => $riddles,
            ], 200);

        } else {
            
            return response()->json([
                'status' => 404,
                'message' => 'No records found',
            ], 404);

        }
    }

    public function random($id)
    {
        $riddle = Riddle::find($id);
        $riddles = Riddle::inRandomOrder()
                        ->limit(49)
                        ->where('id', '!=', $id)
                        ->get();

        $merged = $riddle->merge($riddles);
        $result = $merged->all();

        if ($result->count() > 0) {
            
            return response()->json([
                'status' => 200,
                'result' => $result,
            ], 200);

        } else {
            
            return response()->json([
                'status' => 404,
                'message' => 'No records found',
            ], 404);

        }
    }
}
