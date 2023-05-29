<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    //
    public function savePerson()
    {
        // $json = Storage::disk('local')->get('/public/author/authors.json');
        // $json = Storage::disk('local')->get('/public/author/authors_1.json');
        // $json = Storage::disk('local')->get('/public/author/authors_2.json');
        // $json = Storage::disk('local')->get('/public/author/authors_3.json');
        $json = Storage::disk('local')->get('/public/author/authors_4.json');
        $records = json_decode($json, true);

        foreach($records as $record) {
            $person = new Person();
            $person->author_id = $record['_id'];
            $person->name = $record['name'];
            $person->bio = $record['bio'];
            $person->slug = $record['slug'];
            $person->created_at = Carbon::now();
            $person->save();
        }

        return 'person created succesfully';
    }
}
