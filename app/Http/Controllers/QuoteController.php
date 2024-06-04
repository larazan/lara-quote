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
        $tags = Tag::select('name', 'slug')->get()->random(20);

        $this->data['tags'] = $tags;
    }

    public function index()
    {
        $quotes = Quote::orderBy('id', 'ASC');

        $this->data['quotes'] = $quotes->paginate(20);
		return $this->loadTheme('quotes.index', $this->data);
    }

    public function show($slug)
    {
        $quote = Quote::where('slug', $slug)->first();

        if (!$quote) {
			return redirect('quotes');
		}

        // build breadcrumb data array
		$breadcrumbs_data['current_page_title'] = $quote->name;
		$breadcrumbs_data['breadcrumbs_array'] = $this->_generate_breadcrumbs_array($quote->id);
		$this->data['breadcrumbs_data'] = $breadcrumbs_data;

		$this->data['quote'] = $quote;
		return $this->loadTheme('quotes.detail', $this->data);
    }

    public function showByTag($tag)
    {
        $quotes = Quote::where('tags', 'like', "%{$tag}%");

        $this->data['quotes'] = $quotes->paginate(20);
        $this->data['tag'] = $tag;
		return $this->loadTheme('quotes.index', $this->data);
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
