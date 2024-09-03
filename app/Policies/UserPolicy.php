<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    const ADMIN = 'admin';

    const BAN = 'ban';

    const BLOCK = 'block';

    const DELETE = 'delete';

    public function admin(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function ban(User $user, User $subject): bool
    {
        return ($user->hasRole('admin') && ! $subject->hasRole('admin'));
    }

    public function block(User $user, User $subject): bool
    {
        return ! $user->is($subject) && ! $subject->hasRole('admin');
    }

    public function delete(User $user, User $subject): bool
    {
        return ($user->hasRole('admin') || $user->is($subject)) && ! $subject->hasRole('admin');
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
