<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }


    public function edit(User $user, Comment $comment)
    {
        return $user->id === $comment->user->id;
    }

    public function delete(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id;
    }
}
