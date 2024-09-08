<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function __construct()
    {
        
    }
    
    public function index()
    {
        $plans = Plan::all();

        $this->data['title'] = 'Plan';
        $this->data['plans'] = $plans;
        return $this->loadTheme('plan.index', $this->data);
    }
}
