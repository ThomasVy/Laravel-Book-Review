<?php

namespace App\Policies;

use App\User;
use App\Subscription;
use App\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can create comments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Book $book)
    {
        $book->isSubscribed();
    }

}
