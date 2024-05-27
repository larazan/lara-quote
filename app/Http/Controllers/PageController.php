<?php

namespace App\Http\Controllers;

use App\Models\BusinessSetting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $page = BusinessSetting::where(['key' => 'about_us'])->first();

        $this->data['page'] = $page;
		return $this->loadTheme('about.index', $this->data);
    }

    public function terms()
    {
        $page = BusinessSetting::where(['key' => 'terms_and_conditions'])->first();

        $this->data['page'] = $page;
		return $this->loadTheme('terms.index', $this->data);
    }

    public function policy()
    {
        $page = BusinessSetting::where(['key' => 'privacy_policy'])->first();

        $this->data['page'] = $page;
		return $this->loadTheme('policy.index', $this->data);
    }
}
