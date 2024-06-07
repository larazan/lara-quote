<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Quote;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $quotes = Quote::all();
        $person = Person::all();

        $this->data['quotesCount'] = $quotes->count();
        $this->data['personCount'] = $person->count();
        return $this->loadTheme('home', $this->data);
    }
}
