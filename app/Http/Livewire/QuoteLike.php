<?php

namespace App\Http\Livewire;

use App\Models\Quote;
use Livewire\Component;

class QuoteLike extends Component
{
    public $quote;
    public $count;

    public function mount(Quote $quote)
    {
        $this->quote = $quote;
        $this->count = $quote->likes_count;
    }

    public function like(): void
    {
        // dd($this->quote);

        if ($this->quote->isLiked()) {
            $this->quote->removeLike();
            
            $this->count--;
        } elseif (auth()->user()) {
            $this->quote->likes()->create([
                'user_id' => auth()->id(),
            ]);

            $this->count++;
        } elseif (($ip = request()->ip()) && ($userAgent = request()->userAgent())) {
            $this->quote->likes()->create([
                'ip' => $ip,
                'user_agent' => $userAgent,
            ]);

            $this->count++;
        }
        
    }

    public function render()
    {
        return view('livewire.quote-like');
    }
}
