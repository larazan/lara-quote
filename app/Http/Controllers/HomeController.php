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
        $quotes = Quote::get();
        $person = Person::get();

        $quote = Quote::where('author_id', $author_id)->inRandomOrder()->limit(1)->get();

        $this->data['quote'] = $quote;
        $this->data['quotesCount'] = $quotes->count();
        $this->data['personCount'] = $person->count();
        return $this->loadTheme('home', $this->data);
    }
}
