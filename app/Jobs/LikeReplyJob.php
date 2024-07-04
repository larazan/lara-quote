<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Reply;
use App\Exceptions\CannotLikeItem;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class LikeReplyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $reply;
    private $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Reply $reply, User $user)
    {
        $this->reply = $reply;
        $this->user = $user;
    }

    public function handle()
    {
        if ($this->reply->isLikedBy($this->user)) {
            throw CannotLikeItem::alreadyLiked('reply');
        }

        $this->reply->likedBy($this->user);
    }
}
