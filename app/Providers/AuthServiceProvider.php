<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('actionsThatRequireUserId',function($user,$id)
        {
            return $user->id == $id;
        });

        Gate::define('actionsThatRequireAccountLogin',function($user,$login)
        {
            $account = Account::find($login);
            if($user->id == $account->getUser->id)
            {
                return true;
            }

            return false;
        });

        Gate::before(function($user)
        {
            if(!$user->isAdmin())
            {
                return true;
            }
        });
    }
}
