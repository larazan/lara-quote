<?php

namespace App\Http\Livewire;

use App\Mail\NewsletterVerificationMail;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class NewsletterForm extends Component
{
    public $email = '';

    public function subscribe()
    {

        $validatedData = $this->validate(
            ['email' => 'required|email|unique:newsletter_subscribers,email'],
            [
                'email.required' => 'The :attribute cannot be empty.',
                'email.email' => 'The :attribute format is not valid.',
                'email.unique' => 'This email address has already been used.',
            ],
            ['email' => 'Email']
        );

        // submit data
        Newsletter::create($validatedData);
        // $newsletter = Newsletter::create($validateData);

        // send email
        // Mail::to($this->email)->send(new NewsletterVerificationMail($newsletter));

        $this->dispatchBrowserEvent(
            'banner-message', 
            [
                'style' => 'success', 
                'message' => 'Newsletter successfully submitted'
            ]
        );
    }

    public function render()
    {
        return view('livewire.newsletter-form');
    }
}
