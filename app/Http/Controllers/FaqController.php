<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('order_position', 'ASC');

		$this->data['faqs'] = $faqs->get();
		return $this->loadTheme('faqs.index', $this->data);
    }
}
