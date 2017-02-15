<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Category;
use App\User;

class CategoryPolicy
{
    use HandlesAuthorization;



    public function owner(User $user, Category $category)
    {

        return ($user->rol_id == '2' || $user->rol_id == '4');
    }
}
