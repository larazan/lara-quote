<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Quote;
use App\Models\Tag;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function index2()
    {
        $person = 'albert';
        $search = 'kata';
        $keyword = 'kata';
        $alpha = 'i';
        $tags = Tag::where('name', 'like', "{$alpha}%")->where('status', 'active')->paginate(20);
        // $people = Person::where('name', 'like', "%$person%")->get();
        $people = Person::selectRaw('id, name, slug, SUBSTR(name, 1, 1) as alpha')
                    ->orderBy('alpha', 'asc')
                    ->where('name', 'like', "%$person%")
                    ->get()
                    ->groupBy('alpha');

        $searchres = DB::table('quotes')
            ->leftJoin('persons', 'quotes.author_id', '=', 'persons.author_id')       
            ->select(
                '*',
                'quotes.id AS quote_id',
                'persons.id AS person_id',
                'persons.name AS author',
            )
            ->where('words', 'LIKE', "%$keyword%")
            ->get()
            ->map(function ($row) use ($keyword) {
                $row->words = preg_replace('/(' . $keyword . ')/i', "<b>$1</b>", $row->words);
                return $row;
            });
        
        $this->data['title'] = "Search";
        $this->data['search'] = $search;
        $this->data['people'] = $people;
        $this->data['tags'] = $tags;
        $this->data['searchres'] = $searchres;
		return $this->loadTheme('search.index', $this->data);
    }

    public function search(Request $request)
    {
        // validate 4 character
        $this->validate($request, [
            'search' => 'required|min:4'
        ]);

        $search = $request->input('search');

        // $quotes = Quote::where('words', 'like', "%$search%")->get();
        // $people = Person::where('name', 'like', "%$search%")->get();
        $people = Person::selectRaw('id, name, slug, SUBSTR(name, 1, 1) as alpha')
                    ->orderBy('alpha', 'asc')
                    ->where('name', 'like', "%$search%")
                    ->get()
                    ->groupBy('alpha');
        $tags = Tag::select('name', 'slug', 'status')->where('name', 'like', "%$search%")->where('status', 'active')->get();
        $quotes = DB::table('quotes')
            ->leftJoin('persons', 'quotes.author_id', '=', 'persons.author_id')       
            ->select(
                '*',
                'quotes.id AS quote_id',
                'persons.id AS person_id',
                'persons.name AS author',
            )
            ->where('words', 'LIKE', "%$search%")
            ->get()
            ->map(function ($row) use ($search) {
                $row->words = preg_replace('/(' . $search . ')/i', "<b>$1</b>", $row->words);
                return $row;
            });

        if ($quotes->count() > 0) {
            # code...
        }

        $title = "Search";
       
        return $this->loadTheme('search.index', compact('title', 'search', 'quotes', 'people', 'tags'));
    }
}
