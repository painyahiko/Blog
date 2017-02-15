<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Comment;
use App\User;

class CommentPolicy
{
    use HandlesAuthorization;

    public function owner(User $user, Comment $comment)
    {
        return ($user->id == $comment->user_id || $user->rol_id == '2' || $user->rol_id == '4');
    }
}
