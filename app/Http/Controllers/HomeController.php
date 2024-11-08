<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        
        $quotesCount = Quote::count();
        $personCount = Person::count();

        $quos = Cache::remember('quos', now()->addHour(), function () {
            $author_id = '6110d4a49c759c204c24d837'; // abraham lincoln
            return Quote::select(['id', 'author_id', 'words'])->where('author_id', $author_id)->inRandomOrder()->take(8)->get();
        });
        
        $quot = [];
        $i = 1;
        foreach($quos as $q) {
            array_push($quot, [
                'id' => $i++,
                'body' => $q->words,
                'author' => $q->author($q->author_id)->name
            ]);
        }

        $quotes = $quot;

        // $this->data['quote'] = $quote;
        // $this->data['quotesCount'] = $quotes->count();
        // $this->data['personCount'] = $person->count();
        return $this->loadTheme('home', compact( 'quotes', 'quotesCount', 'personCount'));
    }
}
