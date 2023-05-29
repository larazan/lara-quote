<?php

namespace App\Http\Controllers;

use App\Models\Riddle;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class RiddleController extends Controller
{
    //
    public function saveRiddle()
    {
        $json = Storage::disk('local')->get('/public/riddle.json');
        // $json = Storage::disk('local')->get('/public/riddles.json');
        $records = json_decode($json, true);

        foreach($records as $record) {
            $riddle = new Riddle();
            $riddle->question = $record['words'];
            $riddle->answer = $record['answer'];
            $riddle->status = 'active';
            $riddle->created_at = Carbon::now();
            $riddle->save();
        }

        return 'riddle created succesfully';
    }
}
