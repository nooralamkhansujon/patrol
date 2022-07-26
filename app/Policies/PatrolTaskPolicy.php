<?php

namespace App\Policies;

use App\Models\PatrolTask;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PatrolTaskPolicy
{
    use HandlesAuthorization;
    public  $rolePermission = ['patrol_task:mng','add_patrol_task:mng','modify_patrol_task:mng','delete_patrol_task:mng'];

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
        $permission = $role->permissions()->where('code','patrol_task:mng')->first();
        return $permission ? true:false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PatrolTask  $patrolTask
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, PatrolTask $patrolTask)
    {
        if($user->type === 'super_admin'){
            return true;
        }
        $role_user = $user->roles->first();
        if(!$role_user){
            return false;
        }
        $route = $patrolTask->route;
        if(!$route){
            return false;
        }
        $permission = $role_user->permissions()->where('code','patrol_task:mng')->first();
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
            ['parentCode','=','patrol_task:mng'],
            ['code','=','add_patrol_task:mng']
        ])->first();
        return $permission ? true:false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PatrolTask  $patrolTask
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, PatrolTask $patrolTask)
    {
        if($user->type === 'super_admin'){
            return true;
        }
        $role_user = $user->roles->first();
        if(!$role_user){
            return false;
        }

        $route = $patrolTask->route;
        if(!$route){
            return false;
        }

        $permission = $role_user->permissions()->where([
            ['parentCode','=','patrol_task:mng'],
            ['code','=','modify_patrol_task:mng']
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
            ['parentCode','=','patrol_task:mng'],
            ['code','=','modify_patrol_task:mng']
        ])->first();
        return $permission ? true:false;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PatrolTask  $patrolTask
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, PatrolTask $patrolTask)
    {
        if($user->type === 'super_admin'){
            return true;
        }
        $role_user = $user->roles->first();
        if(!$role_user){
            return false;
        }

        $route = $patrolTask->route;
        if(!$route){
            return false;
        }

        $permission = $role_user->permissions()->where([
            ['parentCode','=','patrol_task:mng'],
            ['code','=','delete_patrol_task:mng']
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
            ['parentCode','=','patrol_task:mng'],
            ['code','=','delete_patrol_task:mng']
        ])->first();
        return $permission ? true:false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PatrolTask  $patrolTask
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, PatrolTask $patrolTask)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PatrolTask  $patrolTask
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, PatrolTask $patrolTask)
    {
        //
    }
}