<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FaqController extends Controller
{
    public function index()
    {
        $author_id = '6110d4a49c759c204c24d837'; // abraham lincoln
        $faqs = Cache::remember('faqs', now()->addMinutes(30), function () {
               return Faq::select(['question', 'answer', 'order_position'])->orderBy('order_position', 'ASC')->get();
        }); 
        $quote = Quote::select(['author_id', 'words'])->where('author_id', $author_id)->inRandomOrder()->take(1)->get();

		$title = "Faqs";
        
		return $this->loadTheme('faqs.index', compact('title', 'quote', 'faqs'));
    }
}
