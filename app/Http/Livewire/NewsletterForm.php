<?php

namespace App\Http\Livewire;

use App\Mail\NewsletterVerificationMail;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class NewsletterForm extends Component
{
    public $email = '';
    public $tes = 'tes';

    public function test()
    {
        dd('tes berjalan');
    }

    public function subscribe()
    {
        $this->tes = 'tes 2';
        $this->email = 'tes 2';

        $validateData = $this->validate([
            'email' => 'required|email|max:128|unique:newsletter_subscribers,email',
        ]);

        // submit data
        $newsletter = Newsletter::create($validateData);

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
