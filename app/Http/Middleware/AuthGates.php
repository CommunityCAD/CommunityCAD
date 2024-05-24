<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AuthGates
{
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if (!$user) {
            return $next($request);
        }

        if (get_setting('use_discord_roles', false)) {

            $response = Cache::remember('user_discord_roles_' . auth()->user()->id, 150, function () use ($user) {
                return Http::accept('application/json')
                    ->withHeaders(['Authorization' => config('app.discord_bot_token')])
                    ->get('https://discord.com/api/guilds/' . get_setting('discord_guild_id') . '/members/' . $user->id);
            });

            Log::debug($response->status());
            Log::debug($response->body());

            $user_roles = json_decode($response->body())->roles;
        }

        $roles = Role::with('permissions')->get();
        $permissionsArray = [];

        foreach ($roles as $role) {
            if (get_setting('use_discord_roles', false)) {
                foreach ($role->permissions as $permissions) {
                    $permissionsArray[$permissions->title][] = $role->discord_role_id;
                }
            } else {
                foreach ($role->permissions as $permissions) {
                    $permissionsArray[$permissions->title][] = $role->id;
                }
            }
        }

        foreach ($permissionsArray as $title => $roles) {
            if (get_setting('use_discord_roles', false)) {
                Gate::define($title, function (User $user) use ($roles, $user_roles) {
                    return count(array_intersect($user_roles, $roles)) > 0;
                });
            } else {
                Gate::define($title, function (User $user) use ($roles) {
                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
                });
            }
        }

        Gate::define('is_super_user', function (User $user) {
            if (in_array($user->id, config('cad.owner_ids'))) {
                return true;
            }

            return $user->is_super_user;
        });

        Gate::define('is_protected_user', function (User $user) {
            if (in_array($user->id, config('cad.owner_ids'))) {
                return true;
            }

            return $user->is_protected_user;
        });

        Gate::define('is_owner_user', function (User $user) {
            return in_array($user->id, config('cad.owner_ids'));
        });

        return $next($request);
    }
}
