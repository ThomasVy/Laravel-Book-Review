<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\SubscriptionPolicy;
use App\Policies\CommentPolicy;
use App\Policies\BookPolicy;
use App\Policies\UserPolicy;
use App\Policies\AuthorPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Author' => 'App\Policies\AuthorPolicy',
        'App\Subscription' => 'App\Policies\SubscriptionPolicy',
        'App\BookPolicy' => 'App\Policies\BookPolicy',
        'App\Comment' => 'App\Policies\CommentPolicy',
        'App\User' => 'App\Policies\UserPolicy',
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
