<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Quote;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function __construct()
    {
        // parent::__construct();

        $letters = [
            'a',
            'b',
            'c',
            'd',
            'e',
            'f',
            'g',
            'h',
            'i',
            'j',
            'k',
            'l',
            'm',
            'n',
            'o',
            'p',
            'q',
            'r',
            's',
            't',
            'u',
            'v',
            'w',
            'x',
            'y',
            'z',
        ];

        $this->data['letters'] = $letters;
    }

    public function index()
    {
        $people = Person::orderBy('name', 'ASC');

        $this->data['title'] = "People";
        $this->data['people'] = $people->paginate(20);
		return $this->loadTheme('people.index', $this->data);
    }

    public function show($slug)
    {
        $person = Person::where('slug', $slug)->first();
        $authorId = $person->author_id;
        $quotes = Quote::where('author_id', $authorId)->get();

        // dd($quotes);

        if (!$person) {
			return redirect('people');
		}

        // build breadcrumb data array
		$breadcrumbs_data['current_page_title'] = $person->name;
		$breadcrumbs_data['breadcrumbs_array'] = $this->_generate_breadcrumbs_array($person->id);
		$this->data['breadcrumbs_data'] = $breadcrumbs_data;

		$this->data['title'] = $person->name;
		$this->data['person'] = $person;
		$this->data['quotes'] = $quotes;
		return $this->loadTheme('people.detail', $this->data);
    }

    public function showByLetter($letter)
    {
        $people = Person::where('name', 'like', "{$letter}%");

        $this->data['title'] = "People Letter " . ucfirst($letter);
        $this->data['people'] = $people->paginate(20);
        $this->data['letter'] = $letter;
		return $this->loadTheme('people.index', $this->data);
    }

    public function _generate_breadcrumbs_array($id) {
		// $homepage_url = url('/');
		// $breadcrumbs_array[$homepage_url] = 'Home';
		
		// get sub cat title
		$sub_cat_title = 'People';
		// get sub cat url
		$sub_cat_url = url('people');
	
		$breadcrumbs_array[$sub_cat_url] = $sub_cat_title;
		return $breadcrumbs_array;
	}

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
