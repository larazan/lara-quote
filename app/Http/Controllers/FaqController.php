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
        $faqs = Faq::orderBy('order_position', 'ASC');
        $quote = Quote::where('author_id', $author_id)->inRandomOrder()->limit(1)->get();

		$this->data['title'] = "Faqs";
        $this->data['quote'] = $quote;
		$this->data['faqs'] = $faqs->get();
		return $this->loadTheme('faqs.index', $this->data);
    }
}
