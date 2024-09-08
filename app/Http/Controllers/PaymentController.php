<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    //
    public function index()
    {
        return $this->loadTheme('checkout.index', [
            'intent' => Auth::user()->createSetupIntent()
        ]);
    }

    public function store(Request $request)
    {

    }
}
