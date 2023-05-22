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
        $records = Storage::json('/public/authors.json');

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
