<?php

namespace App\Providers;

use App\Enums\UserRoleEnum;
use App\Models\Character;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('show-character', function(User $user, Character $character) {
            return $character->users->contains($user->id) || $user->role === UserRoleEnum::GAME_MASTER->value;
        });
    }
}
