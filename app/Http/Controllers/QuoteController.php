<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    //
    public function saveQuote()
    {
        $records = Storage::json('/public/quote_jagokata.json');
        // $records = Storage::json('/public/quote_a.json');
        // $records = Storage::json('/public/quote_b.json');
        // $records = Storage::json('/public/quote_c.json');
        // $records = Storage::json('/public/quote_d.json');
        // $records = Storage::json('/public/quote_e.json');
        // $records = Storage::json('/public/quote_f.json');
        // $records = Storage::json('/public/quote_g.json');
        // $records = Storage::json('/public/quote_h.json');
        // $records = Storage::json('/public/quote_i.json');
        // $records = Storage::json('/public/quote_j.json');
        // $records = Storage::json('/public/quote_k.json');
        // $records = Storage::json('/public/quote_l.json');
        // $records = Storage::json('/public/quote_m.json');
        // $records = Storage::json('/public/quote_n.json');
        // $records = Storage::json('/public/quote_o.json');
        // $records = Storage::json('/public/quote_p.json');
        // $records = Storage::json('/public/quote_q.json');
        // $records = Storage::json('/public/quote_r.json');
        // $records = Storage::json('/public/quote_s.json');
        // $records = Storage::json('/public/quote_t.json');
        // $records = Storage::json('/public/quote_u.json');
        // $records = Storage::json('/public/quote_v.json');
        // $records = Storage::json('/public/quote_w.json');
        // $records = Storage::json('/public/quote_x.json');
        // $records = Storage::json('/public/quote_y.json');
        // $records = Storage::json('/public/quote_z.json');
        // // lanjutan
        // $records = Storage::json('/public/quote_lanjutan_a.json');
        // $records = Storage::json('/public/quote_lanjutan_j.json');
        // $records = Storage::json('/public/quote_lanjutan_j2.json');
        // $records = Storage::json('/public/quote_lanjutan_m.json');
        // $records = Storage::json('/public/quote_lanjutan_r.json');
        // $records = Storage::json('/public/quote_lanjutan_s.json');

        foreach($records as $record) {
            $quote = new Quote();
            $quote->words = $record['words'];
            $quote->author_id = $record['author'];
            $quote->tags = $record['tags'];
            $quote->created_at = Carbon::now();
            $quote->save();
        }

        return 'quote created succesfully';
    }
}
