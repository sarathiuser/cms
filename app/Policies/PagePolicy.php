<?php

namespace App\Policies;

use App\Models\Page;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PagePolicy
{
    use HandlesAuthorization;
    public function before($user, $ability)
    {
        if($user->isAdmin()){
            return true;
        }
    }
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Page $page)
    {
        return $user->id==$page->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Page $page)
    {
        return $user->id==$page->user_id;
    }
}
