<?php

namespace App\Jobs;

use App\Events\EmailAddressWasChanged;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Support\Arr;

class UpdateProfile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $attributes;

    public function __construct(
        private User $user,
        array $attributes = []
    ) {
        $this->attributes = Arr::only($attributes, [
            'first_name', 'last_name', 'email', 'username',
        ]);
    }

    public static function fromRequest(User $user, UpdateProfileRequest $request): self
    {
        return new static($user, [
            'first_name' => $request->first_name(),
            'last_name' => $request->last_name(),
            'email' => $request->email(),
            'username' => strtolower($request->username()),
        ]);
    }

    public function handle(): void
    {
        $emailAddress = $this->user->emailAddress();

        $this->user->update($this->attributes);

        if ($emailAddress !== $this->user->emailAddress()) {
            $this->user->email_verified_at = null;
            $this->user->save();

            event(new EmailAddressWasChanged($this->user));
        }
    }
}
