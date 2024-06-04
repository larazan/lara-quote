<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    //
    public function index()
    {
        // $tags = tag::selectRaw('name', 'slug')->get();
        $tags = DB::select("SELECT name, SUBSTR(name, 1, 1) AS alpha FROM tags GROUP BY SUBSTR(name, 0, 2), name ORDER BY alpha, name");

        $topics = Tag::selectRaw('id, name, slug, SUBSTR(name, 1, 1) as alpha')
                    ->orderBy('alpha', 'asc')
                    ->get()
                    ->groupBy('alpha');

        $this->data['tags'] = $tags;
        $this->data['topics'] = $topics;
		return $this->loadTheme('tags.index', $this->data);
    }

    public function show($letter)
    {
        $alpha = Str::lower($letter);
        $tags = Tag::where('name', 'like', "{$alpha}%");

        $this->data['tags'] = $tags->get();
        $this->data['letter'] = $letter;
		return $this->loadTheme('tags.detail', $this->data);
    }

    public function getTags()
    {
        $quotes = Quote::select('tags')->get()->toArray();
        return $quotes;
    }

    public function test()
    {
        $array = [
            ['Life', 'Love', 'Music'],
            ['Name', 'Why', 'Artist'],
            ['Mom', 'Me', 'Proud'],
            ['Crazy', 'Dead', 'Name'],
            ['Artist', 'First', 'Made'],
            ['Life', 'Love', 'Family'],
        ];

        foreach ($array as $key) {
            // dump($key);
            foreach ($key as $value) {
                Tag::create([
                    'name' => $value,
                    'slug' => Str::slug($value),
                ]);
            }
        }

        return 'insert array value';
    }
}
