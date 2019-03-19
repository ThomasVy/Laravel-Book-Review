<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\SubscriptionPolicy;
use App\Policies\CommentPolicy;
use App\Policies\BookPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        // 'App\Subscription' => 'SubscriptionPolicy',
        // 'App\Comment' => 'App\Policies\CommentPolicy',
        'App\BookPolicy' => 'App\Policies\BookPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::before(function ($user)
        {
            if($user->isAdmin())
              return true;
        });
        //
    }
}
