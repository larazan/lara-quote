<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    //
    public function update($subscription)
    {
        $user = Auth::user();
        $user->subscription($subscription)->resume();
        return redirect()->route('plan')->with('success', 'successfully resume subscription!');
        // return $subscription;
    }

    public function destroy($subscription)
    {
        $user = Auth::user();
        $user->subscription($subscription)->cancel();
        return redirect()->route('plan')->with('success', 'successfully cancel subscription!');
    }
}
