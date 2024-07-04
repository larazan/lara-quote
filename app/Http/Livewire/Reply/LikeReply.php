<?php

namespace App\Http\Livewire\Reply;

use App\Models\Reply;
use App\Jobs\LikeReplyJob;
use App\Jobs\UnlikeReplyJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Livewire\Component;

class LikeReply extends Component
{
    use DispatchesJobs;

    public $reply;

    public function mount(Reply $reply)
    {
        $this->reply = $reply;
    }

    public function toggleLike()
    {
        if ($this->reply->isLikedBy(Auth::user())) {
            $this->dispatchSync(new UnlikeReplyJob($this->reply, Auth::user()));
        } else {
            $this->dispatchSync(new LikeReplyJob($this->reply, Auth::user()));
        }
    }
    
    public function render()
    {
        return view('livewire.reply.like-reply');
    }
}
