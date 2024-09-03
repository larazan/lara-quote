<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher;

class UpdatePassword implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private User $user, private string $newPassword)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Hasher $hasher)
    {
        $this->user->update(['password' => $hasher->make($this->newPassword)]);
    }
}
