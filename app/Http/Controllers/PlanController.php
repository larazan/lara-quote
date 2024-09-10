<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    public function __construct()
    {
        
    }
    
    public function index()
    {
        $plans = Plan::all();
        $user = Auth::user();

        $this->data['title'] = 'Plan';
        $this->data['plans'] = $plans;
        $this->data['user'] = $user;
        return $this->loadTheme('plan.index', $this->data);
    }
}
