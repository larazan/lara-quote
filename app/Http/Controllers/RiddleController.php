<?php

namespace App\Http\Controllers;

use App\Models\Riddle;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class RiddleController extends Controller
{
    public function index()
    {
        $riddles = Riddle::orderBy('id', 'ASC');

        $this->data['riddles'] = $riddles->paginate(20);
		return $this->loadTheme('riddles.index', $this->data);
    }

    public function show($id)
    {
        $riddle = Riddle::where('id', $id)->first();
        $riddles = Riddle::inRandomOrder()
                        ->limit(49)
                        ->where('id', '!=', $id)
                        ->get();

        $collection = collect([$riddle]);
        $merged = $collection->merge($riddles);
        $merged->all();

        $this->data['riddles'] = $merged;
		return $this->loadTheme('riddles.index', $this->data);
    }

    public function random()
    {
        $riddles = Riddle::inRandomOrder()
                    ->limit(50)
                    ->get();

        $this->data['riddles'] = $riddles;
		return $this->loadTheme('riddles.detail', $this->data);
    }

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
