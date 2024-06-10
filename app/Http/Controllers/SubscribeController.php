<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Mail\Websitemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller
{
    //
    public function store(Request $request)
    {
            $validated = $request->validate([
                'email' => 'required|email|unique:subscribers|max:30']);

        // else
        // {
            $token = hash('sha256', time());
            $subscriber = new Newsletter();
            $subscriber->email = $request->email;
            $subscriber->token = $token;
            $subscriber->status = 'Pending';
            // $subscriber->save();

            $subscriber->save() ? 'You have successfully subscribed.' : 'Something went wrong, please try again.';

            // Send email
            $subject = 'Please Comfirm Subscription';
            $verification_link = url('subscriber/verify/'.$token.'/'.$request->email);
            $message = 'Please click on the following link in order to verify as subscriber:<br><br>';
            
            // $message .= $verification_link;

            $message .= '<a href="'.$verification_link.'">';
            $message .= $verification_link;
            $message .= '</a><br><br>';
            $message .= 'If you received this email by mistake, simply delete it. You will not be subscribed if you do not  click the confirmation link above.';

            Mail::to($request->email)->send(new Websitemail($subject,$message));

            return redirect()->back()->with('success', 'Thanks, please check your inbox to confirm subscription');
        // }
    }

    public function verify($token,$email)
    {

        // Helpers::read_json();
        
        $subscriber_data = Newsletter::where('token',$token)->where('email',$email)->first();
        if($subscriber_data) 

        
        {
            $subscriber_data->token = '';
            $subscriber_data->status = 'Active';
            $subscriber_data->update();

            return redirect()->back()->with('success', 'You are successfully verified as a subscribe to this system');
        } 
        else 
        {
            return redirect()->route('form');
        }
    }
}
