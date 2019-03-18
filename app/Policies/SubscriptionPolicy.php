<?php

namespace App\Policies;

use App\User;
use App\Subscription;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriptionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the subscription.
     *
     * @param  \App\User  $user
     * @param  \App\Subscription  $subscription
     * @return mixed
     */
    public function update(User $user, Subscription $subscription)
    {
        return $user.id === $subscription.user_id;
    }


}
