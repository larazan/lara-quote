<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Tag;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuoteController extends Controller
{
    public function __construct()
    {
        $shareComponent = \Share::page(
            'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
            'Your share text comes here',
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()        
        ->reddit();

        $tags = Tag::select('name', 'slug')->get()->random(50);

        $styles = [
            [ 'font' => "Aelten", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#000', 'fontColor' => '#fff' ],
            [ 'font' => "Alphakind", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ead59e', 'fontColor' => '#000' ],
            [ 'font' => "Bajurie", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ee905f', 'fontColor' => '#fff' ],
            [ 'font' => "Banda-Aceh", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f49f91', 'fontColor' => '#fff' ],
            [ 'font' => "Bitcrusher", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#011528', 'fontColor' => '#fff' ],
            [ 'font' => "Blue_highway_cd", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#c04d9a', 'fontColor' => '#fff' ],
            [ 'font' => "Bright-Dreams", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f7f7f7', 'fontColor' => '#000' ],
            [ 'font' => "Chandella", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#e9dcd3', 'fontColor' => '#000' ],
            [ 'font' => "Chinese-Rocks", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f4e4d0', 'fontColor' => '#000' ],
            [ 'font' => "Cokobi", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#90c9cf', 'fontColor' => '#000' ],
            [ 'font' => "Colombia", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ffffeb', 'fontColor' => '#000' ],
            [ 'font' => "ConcreteWall", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#4cc1bc', 'fontColor' => '#fff' ],
            [ 'font' => "Coolvetica", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#468bdb', 'fontColor' => '#fff' ],
            [ 'font' => "Dakwart", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#212331', 'fontColor' => '#fff' ],
            [ 'font' => "DAGOCA", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f1d265', 'fontColor' => '#fff' ],
            [ 'font' => "Dealerplate-California", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#efb4d2', 'fontColor' => '#000' ],
            [ 'font' => "Dream-Orphans", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ebdddc', 'fontColor' => '#000' ],
            [ 'font' => "Elliane-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#e4c8c4', 'fontColor' => '#000' ],
            [ 'font' => "Engebrechtre", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#009492', 'fontColor' => '#fff' ],
            [ 'font' => "ENGINE", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#e3d1cf', 'fontColor' => '#000' ],
            [ 'font' => "Foo", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#2d2c31', 'fontColor' => '#fff' ],
            [ 'font' => "Gnuolane", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#e8e29e', 'fontColor' => '#000' ],
            [ 'font' => "Gratise", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f49f91', 'fontColor' => '#fff' ],
            [ 'font' => "Groomer", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#e96379', 'fontColor' => '#000' ],
            [ 'font' => "Halmera", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#e8d7f7', 'fontColor' => '#000' ],
            [ 'font' => "HappyGarden", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ee725a', 'fontColor' => '#fff' ],
            [ 'font' => "Hellohowareyou", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#b3d3d8', 'fontColor' => '#000' ],
            [ 'font' => "Helsinki", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#27215f', 'fontColor' => '#fff' ],
            [ 'font' => "Inter-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f69b00', 'fontColor' => '#fff' ],
            [ 'font' => "Jreeng", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f69b00', 'fontColor' => '#000' ],
            [ 'font' => "Kaylafiz", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f6e9d7', 'fontColor' => '#fc9598' ],
            [ 'font' => "Kimberley", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f6e9d7', 'fontColor' => '#ff8459' ],
            [ 'font' => "Leorio", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f6e9d7', 'fontColor' => '#dbba0c' ],
            [ 'font' => "Limejuice", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f6e9d7', 'fontColor' => '#95c9a8' ],
            [ 'font' => "Lovetle", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f6e9d7', 'fontColor' => '#425fa6' ],
            [ 'font' => "Lynoselt", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f6e9d7', 'fontColor' => '#a5abe4' ],
            [ 'font' => "MatSaleh", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#a5abe4', 'fontColor' => '#fff' ],
            [ 'font' => "MelocheBook", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ffc0ca', 'fontColor' => '#a088f6' ],
            [ 'font' => "MightyKingdom", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ffc0ca', 'fontColor' => '#93caaa' ],
            [ 'font' => "Monofonto", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ffc0ca', 'fontColor' => '#000' ],
            [ 'font' => "MorningMiow", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#429eda', 'fontColor' => '#fff' ],
            [ 'font' => "Mounets", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f7f8f0', 'fontColor' => '#000' ],
            [ 'font' => "NoVirus", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#fffefc', 'fontColor' => '#000' ],
            [ 'font' => "Oaklevin", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#fff0d9', 'fontColor' => '#000' ],
            [ 'font' => "Ontel", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ffe1e7', 'fontColor' => '#fa8764' ],
            [ 'font' => "Peace", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#fbe3c0', 'fontColor' => '#99b84e' ],
            [ 'font' => "Pouline", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#fbe3c0', 'fontColor' => '#fc8c47' ],
            [ 'font' => "Pretender", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ff8a77', 'fontColor' => '#febe96' ],
            [ 'font' => "Rakesly", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ff8a77', 'fontColor' => '#fef5e4' ],
            [ 'font' => "Rennoya", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ff8a77', 'fontColor' => '#dbf0d3' ],
            [ 'font' => "ROLAND", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#dac757', 'fontColor' => '#ffe6f2' ],
            [ 'font' => "Saolice", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#dac757', 'fontColor' => '#ffffb3' ],
            [ 'font' => "SimpalaExtended", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#dac757', 'fontColor' => '#df775a' ],
            [ 'font' => "SingleSleeve", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#e1ca42', 'fontColor' => '#436460' ],
            [ 'font' => "StraightlerRegular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#bd6c3e', 'fontColor' => '#f7b1ab' ],
            [ 'font' => "SweetSomeday", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#bd6c3e', 'fontColor' => '#d8c338' ],
            [ 'font' => "Tahu", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#fbf4e4', 'fontColor' => '#f2c4c4' ],
            [ 'font' => "Thruster-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#fbf4e4', 'fontColor' => '#8eb19c' ],
            [ 'font' => "VirusKiller", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#fbf4e4', 'fontColor' => '#d4c058' ],
            [ 'font' => "WallabysJunior", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#fbf4e4', 'fontColor' => '#f9c095' ],
            [ 'font' => "ZZYZX", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f0ffeb', 'fontColor' => '#ffa8d5' ],
            [ 'font' => "WhereTheCookies", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f0ffeb', 'fontColor' => '#c3ae0b' ],
            [ 'font' => "WKSimple", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f0ffeb', 'fontColor' => '#86c8f4' ],
            [ 'font' => "Arvo-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f0ffeb', 'fontColor' => '#ff9752' ],
            [ 'font' => "Cinzel-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f29b8f', 'fontColor' => '#fef5e4' ],
            [ 'font' => "Domine-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f29b8f', 'fontColor' => '#da6737' ],
            [ 'font' => "LiberationSerif-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f2e1f7', 'fontColor' => '#223679' ],
            [ 'font' => "Lustria-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f2e1f7', 'fontColor' => '#cda0c6' ],
            [ 'font' => "Mohave-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f2e1f7', 'fontColor' => '#fd9e7e' ],
            [ 'font' => "Montserrat-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f2e1f7', 'fontColor' => '#227a65' ],
            [ 'font' => "NotoSans-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f2e1f7', 'fontColor' => '#8ba4dd' ],
            [ 'font' => "Promesh_Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f09d5e', 'fontColor' => '#fdf4e0' ],
            [ 'font' => "Raleway-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#d4bf42', 'fontColor' => '#70723d' ],
            [ 'font' => "Rubik-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f09d60', 'fontColor' => '#fff' ],
            [ 'font' => "Zaio", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#f09d60', 'fontColor' => '#406653' ],
            [ 'font' => "Antonio-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ffc7a3', 'fontColor' => '#e26b46' ],
            [ 'font' => "Bitter-Regular", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ffc7a3', 'fontColor' => '#3b86c4' ],
            [ 'font' => "COBAISSI", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ffc7a3', 'fontColor' => '#a5442c' ],
            [ 'font' => "CrimsonText-Roman", 'fontSize' => '14px', 'fontBold' => '14px', 'bgColor' => '#ffc7a3', 'fontColor' => '#1c4255' ],
        ];

        $this->data['styles'] = $styles;
        $this->data['tags'] = $tags;
        $this->data['shareComponent'] = $shareComponent;
    }

    public function index()
    {
        $quotes = Quote::orderBy('id', 'ASC');

        $this->data['title'] = "Quotes";
        $this->data['quotes'] = $quotes->paginate(20);
		return $this->loadTheme('quotes.index', $this->data);
    }

    public function show($id)
    {
        $quote = Quote::where('id', $id)->first();

        if (!$quote) {
			return redirect('quotes');
		}

        // build breadcrumb data array
		$breadcrumbs_data['current_page_title'] = $quote->name;
		$breadcrumbs_data['breadcrumbs_array'] = $this->_generate_breadcrumbs_array($id);
		$this->data['breadcrumbs_data'] = $breadcrumbs_data;

        $tags = $quote->tags;
        if($tags)
        {
            $arrTags = explode(',', $quote->tags);
        } else {
            $arrTags = $tags;
        }
        
        $this->data['title'] = $quote->words;
		$this->data['quote'] = $quote;
		$this->data['id'] = $id;
		$this->data['tags'] = $arrTags;
        $this->data['author'] = $quote->author($quote->author_id)->name;
        $this->data['slug'] = $quote->author($quote->author_id)->slug;
		return $this->loadTheme('quotes.detail', $this->data);
    }

    public function showByTag($tag)
    {
        $quotes = Quote::where('tags', 'like', "%{$tag}%");

        $this->data['title'] = "Topic: " . ucfirst($tag);
        $this->data['quotes'] = $quotes->paginate(20);
        $this->data['tag'] = $tag;
		return $this->loadTheme('quotes.index', $this->data);
    }

    public function showcase($id)
    {
        $quote = Quote::where('id', $id)->first();

        if (!$quote) {
			return redirect('quotes');
		}

        // build breadcrumb data array
		$breadcrumbs_data['current_page_title'] = $quote->name;
		$breadcrumbs_data['breadcrumbs_array'] = $this->_generate_breadcrumbs_array($id);
		$this->data['breadcrumbs_data'] = $breadcrumbs_data;

        $tags = $quote->tags;
        if($tags)
        {
            $arrTags = explode(',', $quote->tags);
        } else {
            $arrTags = $tags;
        }
        
        $this->data['title'] = $quote->words;
        $this->data['id'] = $id;
		$this->data['quote'] = $quote;
		$this->data['tags'] = $arrTags;
        $this->data['author'] = $quote->author($quote->author_id)->name;
		return $this->loadTheme('quotes.showcase', $this->data);
    }

    public function showcaseBy($id, $type)
    {
        $quote = Quote::where('id', $id)->first();

        $fontSize = collect([
            8,
            9,
            10,
            11,
            12,
            14,
            20,
            24,
            40
        ]); 

        if (!$quote) {
			return redirect('quotes');
		}

        // build breadcrumb data array
		$breadcrumbs_data['current_page_title'] = $quote->name;
		$breadcrumbs_data['breadcrumbs_array'] = $this->_generate_breadcrumbs_array($id);
		$this->data['breadcrumbs_data'] = $breadcrumbs_data;

        $tags = $quote->tags;
        if($tags)
        {
            $arrTags = explode(',', $quote->tags);
        } else {
            $arrTags = $tags;
        }
        
        $this->data['fontSize'] = $fontSize;
		$this->data['title'] = $quote->words;
		$this->data['quote'] = $quote;
		$this->data['id'] = $id;
		$this->data['type'] = $type;
		$this->data['tags'] = $arrTags;
        $this->data['author'] = $quote->author($quote->author_id)->name;
        $this->data['slug'] = $quote->author($quote->author_id)->slug;
		return $this->loadTheme('quotes.show', $this->data);
    }

    public function _generate_breadcrumbs_array($id) {
		// $homepage_url = url('/');
		// $breadcrumbs_array[$homepage_url] = 'Home';
		
		// get sub cat title
		$sub_cat_title = 'Quotes';
		// get sub cat url
		$sub_cat_url = url('quotes');
	
		$breadcrumbs_array[$sub_cat_url] = $sub_cat_title;
		return $breadcrumbs_array;
	}

    //
    public function saveQuote()
    {
        // $json = Storage::disk('local')->get('/public/quote_jagokata/quote_jagokata.json');
        // $json = Storage::disk('local')->get('/public/quote_jagokata/quote_jagokata1.json');
        // $json = Storage::disk('local')->get('/public/quote_jagokata/quote_jagokata2.json');
        // $json = Storage::disk('local')->get('/public/quote_jagokata/quote_jagokata3.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_a/quote_a.json');
        // $json = Storage::disk('local')->get('/public/quote_a/quote_a1.json');
        // $json = Storage::disk('local')->get('/public/quote_a/quote_a2.json');
        // $json = Storage::disk('local')->get('/public/quote_a/quote_a3.json');
        // $json = Storage::disk('local')->get('/public/quote_a/quote_a4.json');
        // $json = Storage::disk('local')->get('/public/quote_a/quote_a5.json');
        // $json = Storage::disk('local')->get('/public/quote_a/quote_a6.json');
        // $json = Storage::disk('local')->get('/public/quote_a/quote_a7.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_b/quote_b.json');
        // $json = Storage::disk('local')->get('/public/quote_b/quote_b1.json');
        // $json = Storage::disk('local')->get('/public/quote_b/quote_b2.json');
        // $json = Storage::disk('local')->get('/public/quote_b/quote_b3.json');
        // $json = Storage::disk('local')->get('/public/quote_b/quote_b4.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_c/quote_c.json');
        // $json = Storage::disk('local')->get('/public/quote_c/quote_c1.json');
        // $json = Storage::disk('local')->get('/public/quote_c/quote_c2.json');
        // $json = Storage::disk('local')->get('/public/quote_c/quote_c3.json');
        // $json = Storage::disk('local')->get('/public/quote_c/quote_c4.json');
        // $json = Storage::disk('local')->get('/public/quote_c/quote_c5.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_d/quote_d.json');
        // $json = Storage::disk('local')->get('/public/quote_d/quote_d1.json');
        // $json = Storage::disk('local')->get('/public/quote_d/quote_d2.json');
        // $json = Storage::disk('local')->get('/public/quote_d/quote_d3.json');
        // $json = Storage::disk('local')->get('/public/quote_d/quote_d4.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_e/quote_e.json');
        // $json = Storage::disk('local')->get('/public/quote_e/quote_e1.json');
        // $json = Storage::disk('local')->get('/public/quote_e/quote_e2.json');
        // $json = Storage::disk('local')->get('/public/quote_e/quote_e3.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_f/quote_f.json');
        // $json = Storage::disk('local')->get('/public/quote_f/quote_f1.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_g/quote_g.json');
        // $json = Storage::disk('local')->get('/public/quote_g/quote_g1.json');
        // $json = Storage::disk('local')->get('/public/quote_g/quote_g2.json');
        // $json = Storage::disk('local')->get('/public/quote_g/quote_g3.json');
        // $json = Storage::disk('local')->get('/public/quote_g/quote_g4.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_h/quote_h.json');
        // $json = Storage::disk('local')->get('/public/quote_h/quote_h1.json');
        // $json = Storage::disk('local')->get('/public/quote_h/quote_h2.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_i/quote_i.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j1.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j2.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j3.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j4.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j5.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j6.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j7.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j8.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j9.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j10.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j11.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j12.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j13.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j14.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_k/quote_k.json');
        // $json = Storage::disk('local')->get('/public/quote_k/quote_k1.json');
        // $json = Storage::disk('local')->get('/public/quote_k/quote_k2.json');
        // $json = Storage::disk('local')->get('/public/quote_k/quote_k3.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_l/quote_l.json');
        // $json = Storage::disk('local')->get('/public/quote_l/quote_l1.json');
        // $json = Storage::disk('local')->get('/public/quote_l/quote_l2.json');
        // $json = Storage::disk('local')->get('/public/quote_l/quote_l3.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_m/quote_m.json');
        // $json = Storage::disk('local')->get('/public/quote_m/quote_m1.json');
        // $json = Storage::disk('local')->get('/public/quote_m/quote_m2.json');
        // $json = Storage::disk('local')->get('/public/quote_m/quote_m3.json');
        // $json = Storage::disk('local')->get('/public/quote_m/quote_m4.json');
        // $json = Storage::disk('local')->get('/public/quote_m/quote_m5.json');
        // $json = Storage::disk('local')->get('/public/quote_m/quote_m6.json');
        // $json = Storage::disk('local')->get('/public/quote_m/quote_m7.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_n/quote_n.json');
        // $json = Storage::disk('local')->get('/public/quote_n/quote_n1.json');
        // $json = Storage::disk('local')->get('/public/quote_n/quote_n2.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_o/quote_o.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_p/quote_p.json');
        // $json = Storage::disk('local')->get('/public/quote_p/quote_p1.json');
        // $json = Storage::disk('local')->get('/public/quote_p/quote_p2.json');
        // $json = Storage::disk('local')->get('/public/quote_p/quote_p3.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_q/quote_q.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_r/quote_r.json');
        // $json = Storage::disk('local')->get('/public/quote_r/quote_r1.json');
        // $json = Storage::disk('local')->get('/public/quote_r/quote_r2.json');
        // $json = Storage::disk('local')->get('/public/quote_r/quote_r3.json');
        // $json = Storage::disk('local')->get('/public/quote_r/quote_r4.json');
        // $json = Storage::disk('local')->get('/public/quote_r/quote_r5.json');
        // $json = Storage::disk('local')->get('/public/quote_r/quote_r6.json');
        // $json = Storage::disk('local')->get('/public/quote_r/quote_r7.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_s/quote_s.json');
        // $json = Storage::disk('local')->get('/public/quote_s/quote_s1.json');
        // $json = Storage::disk('local')->get('/public/quote_s/quote_s2.json');
        // $json = Storage::disk('local')->get('/public/quote_s/quote_s3.json');
        // $json = Storage::disk('local')->get('/public/quote_s/quote_s4.json');
        // $json = Storage::disk('local')->get('/public/quote_s/quote_s5.json');
        // $json = Storage::disk('local')->get('/public/quote_s/quote_s6.json');
        // $json = Storage::disk('local')->get('/public/quote_s/quote_s7.json');
        // $json = Storage::disk('local')->get('/public/quote_s/quote_s8.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_t/quote_t.json');
        // $json = Storage::disk('local')->get('/public/quote_t/quote_t1.json');
        // $json = Storage::disk('local')->get('/public/quote_t/quote_t2.json');
        // $json = Storage::disk('local')->get('/public/quote_t/quote_t3.json');
        // $json = Storage::disk('local')->get('/public/quote_t/quote_t4.json');
        $json = Storage::disk('local')->get('/public/quote_t/quote_t5.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_u/quote_u.json');
        // $json = Storage::disk('local')->get('/public/quote_v/quote_v.json');
        // $json = Storage::disk('local')->get('/public/quote_w/quote_w.json');
        // $json = Storage::disk('local')->get('/public/quote_w/quote_w1.json');
        // $json = Storage::disk('local')->get('/public/quote_x/quote_x.json');
        // $json = Storage::disk('local')->get('/public/quote_y/quote_y.json');
        // $json = Storage::disk('local')->get('/public/quote_z/quote_z.json');

        //oquvwxyz

        $records = json_decode($json, true);

        foreach($records as $record) {
            $quote = new Quote();
            $quote->words = $record['words'];
            $quote->slug = Str::random(12);
            $quote->author_id = $record['author'];
            $quote->tags = implode(",", $record['tags']);
            $quote->created_at = Carbon::now();
            $quote->save();
        }

        return 'quote created succesfully';
    }

    public function insertRand()
    {
        $quotes = Quote::all();

        foreach ($quotes as $q) {
            Quote::where('id', $q->id)->update(['slug' => Str::random(12)]);
        }

        // DB::beginTransaction();
        //     foreach ($quotes as $q) {
        //         DB::table('quotes')
        //             ->where('id', '=', $q->id)
        //             ->update(['slug' => Str::random(12)
        //         ]);
        //     }
        // DB::commit();

        return 'quote slug updated succesfully';
    }
}
