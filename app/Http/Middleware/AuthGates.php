<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Gate;

class AuthGates
{
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if (! $user) {
            return $next($request);
        }

        $roles = Role::with('permissions')->get();
        $permissionsArray = [];

        foreach ($roles as $role) {
            foreach ($role->permissions as $permissions) {
                $permissionsArray[$permissions->title][] = $role->id;
            }
        }

        foreach ($permissionsArray as $title => $roles) {
            Gate::define($title, function (User $user) use ($roles) {
                return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
            });
        }

        Gate::define('is_super_user', function (User $user) {
            return $user->is_super_user;
        });

        Gate::define('is_protected_user', function (User $user) {
            return $user->is_protected_user;
        });

        Gate::define('is_owner_user', function (User $user) {
            return in_array($user->id, config('cad.owner_ids'));
        });

        return $next($request);
    }
}
