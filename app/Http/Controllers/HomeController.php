<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Quote;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $author_id = '6110d4a49c759c204c24d837'; // abraham lincoln
        $quotesCount = Quote::count();
        $personCount = Person::count();

        $quote = Quote::select(['author_id', 'words'])->where('author_id', $author_id)->inRandomOrder()->limit(1)->get();
        $quos = Quote::select(['id', 'author_id', 'words'])->where('author_id', $author_id)->inRandomOrder()->limit(8)->get();

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
        return $this->loadTheme('home', compact('quote', 'quotes', 'quotesCount', 'personCount'));
    }
}
