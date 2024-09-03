<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanController extends Controller
{
    //
    public function index()
    {
        $this->data['title'] = 'Plan';
        return $this->loadTheme('plan.index', $this->data);
    }
}
