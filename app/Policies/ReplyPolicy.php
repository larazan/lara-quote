<?php

namespace App\Policies;

use App\Models\Reply;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyPolicy
{
    use HandlesAuthorization;

    const CREATE = 'create';
    const UPDATE = 'update';
    const DELETE = 'delete';

    public function create(User $user): bool
    {
        return $user->hasVerifiedEmail();
    }
    // auth()->user()->hasRole('admin')
    public function update(User $user, Reply $reply): bool
    {
        return $reply->isAuthoredBy($user) || $user->hasRole('admin');
    }

    public function delete(User $user, Reply $reply): bool
    {
        return $reply->isAuthoredBy($user) || $user->hasRole('admin');
    }
    
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
