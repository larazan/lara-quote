<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Quote;
use App\Models\Tag;
use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function index()
    {

        $this->data['title'] = "Search";
		return $this->loadTheme('search.index', $this->data);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $quotes = Quote::where('words', 'like', "%$search%")->get();
        $people = Person::where('name', 'like', "%$search%")->get();
        $tags = Tag::where('name', 'like', "%$search%")->get();

        if ($quotes->count() > 0) {
            # code...
        }

        $this->data['title'] = "Search";
        $this->data['quotes'] = $quotes;
        $this->data['people'] = $people;
        $this->data['tags'] = $tags;
        return $this->loadTheme('search.index', $this->data);
    }
}
