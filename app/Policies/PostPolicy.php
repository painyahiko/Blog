<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Post;
use App\User;

class PostPolicy
{
    use HandlesAuthorization;

    public function owner(User $user, Post $post)
    {
        return ($user->id === $post->user_id || $user->rol_id == '2' || $user->rol_id == '4');
    }


}
