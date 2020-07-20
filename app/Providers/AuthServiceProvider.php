<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];


    public function boot()
    {
        $this->registerPolicies();

        \Gate::define('update-question', function ($user, $question)
        {
            return $user->id = $question->user_id;
        });

        \Gate::define('delete-question', function ($user, $question)
        {
            return $user->id = $question->user_id;
        });
    }
}
