<?php

namespace App\Policies;

use App\User;
use App\author;
use Illuminate\Auth\Access\HandlesAuthorization;

class AuthorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the author.
     *
     * @param  \App\User  $user
     * @param  \App\author  $author
     * @return mixed
     */
    public function view(User $user, author $author)
    {
        return ($user.isAdmin() || user.isSubscriber());
    }

    /**
     * Determine whether the user can create authors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user.isAdmin();
    }

    /**
     * Determine whether the user can update the author.
     *
     * @param  \App\User  $user
     * @param  \App\author  $author
     * @return mixed
     */
    public function update(User $user, author $author)
    {
        return $user.isAdmin();
    }

    /**
     * Determine whether the user can delete the author.
     *
     * @param  \App\User  $user
     * @param  \App\author  $author
     * @return mixed
     */
    public function delete(User $user, author $author)
    {
        return $user.isAdmin();
    }

}
