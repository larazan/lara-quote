<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //
    public function index()
    {
        $tags = tag::select('name', 'slug')->get();

        $this->data['tags'] = $tags;
		return $this->loadTheme('tags.index', $this->data);
    }

    public function show($letter)
    {
        $tags = Tag::where('name', 'like', "{$letter}%");

        $this->data['tags'] = $tags->paginate(20);
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
