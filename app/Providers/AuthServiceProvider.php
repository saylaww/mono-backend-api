<?php

namespace App\Providers;

use App\Http\Controllers\CourseController;
use App\Models\Course;
use App\Models\User;
use App\Policies\CoursePolicy;
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
//        CourseController::class =>CoursePolicy::class,
//    Course::class =>CoursePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('isDirector', function (User $user){
            if ($user->role->name=='DIRECTOR'){
                return true;
            }else{
                return false;
            }
        });

        Gate::define('isManager', function (User $user){
            if ($user->role->name=='MANAGER'){
                return true;
            }else{
                return false;
            }
        });

        Gate::define('isStudent', function (User $user){
            if ($user->role->name=='STUDENT'){
                return true;
            }else{
                return false;
            }
        });



    }
}
