<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Quote;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $author_id = '6110d4a49c759c204c24d837'; // abraham lincoln
        $faqs = Faq::select(['question', 'answer', 'order_position'])->orderBy('order_position', 'ASC')->get();
        $quote = Quote::select(['author_id', 'words'])->where('author_id', $author_id)->inRandomOrder()->limit(1)->get();

		$title = "Faqs";
        
		return $this->loadTheme('faqs.index', compact('title', 'quote', 'faqs'));
    }
}
