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
        $riddles = Riddle::paginate(request()->all());
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
        $riddle = Riddle::where('id', $id)->first();
        $riddles = Riddle::inRandomOrder()
                        ->limit(49)
                        ->where('id', '!=', $id)
                        ->get();

        $collection = collect([$riddle]);
        $merged = $collection->merge($riddles);
        $merged->all();

        if ($merged->count() > 0) {
            
            return response()->json([
                'status' => 200,
                'total' => count($merged),
                'result' => $merged,
            ], 200);

        } else {
            
            return response()->json([
                'status' => 404,
                'message' => 'No records found',
            ], 404);

        }
    }
}
