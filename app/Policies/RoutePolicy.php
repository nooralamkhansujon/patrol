<?php

namespace App\Policies;

use App\Models\Route;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoutePolicy
{
    use HandlesAuthorization;
    public  $routePermission = ['route:root','add_route:mng','modify_route:mng','delete_route:mng'];

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if($user->type === 'super_admin'){
            return true;
        }
        $role = $user->roles->first();
        if(!$role){
            return false;
        }
        $permission = $role->permissions()->where('code','route:root')->first();
        return $permission ? true:false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Route $route)
    {
        if($user->type === 'super_admin'){
            return true;
        }
        $role_user = $user->roles->first();
        if(!$role_user){
            return false;
        }
        $permission = $role_user->permissions()->where('code','route:root')->first();
        return $permission && $user->organization_id === $route->organization_id ? true:false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if($user->type === 'super_admin'){
            return true;
        }
        $role_user = $user->roles->first();
        if(!$role_user){
            return false;
        }
        $permission = $role_user->permissions()->where([
            ['parentCode','=','route:root'],
            ['code','=','add_route:mng']
        ])->first();
        return $permission ? true:false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Route $route)
    {
        if($user->type === 'super_admin'){
            return true;
        }
        $role_user = $user->roles->first();
        if(!$role_user){
            return false;
        }
        $permission = $role_user->permissions()->where([
            ['parentCode','=','route:mng'],
            ['code','=','modify_route:mng']
        ])->first();
        return $permission && $user->organization_id === $route->organization_id ? true:false;
    }

    public function updateView(User $user)
    {
        if($user->type === 'super_admin'){
            return true;
        }
        $role_user = $user->roles->first();
        if(!$role_user){
            return false;
        }
        $permission = $role_user->permissions()->where([
            ['parentCode','=','route:root'],
            ['code','=','modify_route:mng']
        ])->first();
        return $permission ? true:false;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Route $route)
    {
        if($user->type === 'super_admin'){
            return true;
        }
        $role_user = $user->roles->first();
        if(!$role_user){
            return false;
        }

        $permission = $role_user->permissions()->where([
            ['parentCode','=','route:root'],
            ['code','=','delete_route:mng']
        ])->first();
        return $permission && $user->organization_id === $route->organization_id ? true:false;
    }

    public function deleteView(User $user)
    {
        if($user->type === 'super_admin'){
            return true;
        }
        $role = $user->roles->first();
        if(!$role){
            return false;
        }
        $permission = $role->permissions()->where([
            ['parentCode','=','route:root'],
            ['code','=','delete_route:mng']
        ])->first();
        return $permission ? true:false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Route $route)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Route $route)
    {
        //
    }
}