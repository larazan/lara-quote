<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Tag;
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
}
