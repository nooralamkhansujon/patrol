<?php

namespace App\Policies;

use App\Models\PatrolMan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PatrolManPolicy
{
    use HandlesAuthorization;
    public  $rolePermission = ['patrolman:mng','add_patrolman:mng','modify_patrolman:mng','delete_patrolman:mng'];
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
        $permission = $role->permissions()->where('code','patrolman:mng')->first();
        return $permission ? true:false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PatrolMan  $patrolMan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, PatrolMan $patrolMan)
    {
        if($user->type === 'super_admin'){
            return true;
        }
        $role_user = $user->roles->first();
        if(!$role_user){
            return false;
        }
        $permission = $role_user->permissions()->where('code','patrolman:mng')->first();
        return $permission && $patrolMan->organization_id === $user->organization_id ? true:false;
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
            ['parentCode','=','patrolman:mng'],
            ['code','=','add_patrolman:mng']
        ])->first();
        return $permission ? true:false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PatrolMan  $patrolMan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, PatrolMan $patrolMan)
    {
        if($user->type === 'super_admin'){
            return true;
        }
        $role_user = $user->roles->first();
        if(!$role_user){
            return false;
        }
        $permission = $role_user->permissions()->where([
            ['parentCode','=','patrolman:mng'],
            ['code','=','modify_patrolman:mng']
        ])->first();
        return $permission && $patrolMan->organization_id === $user->organization_id ? true:false;
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
            ['parentCode','=','patrolman:mng'],
            ['code','=','modify_patrolman:mng']
        ])->first();
        return $permission ? true:false;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PatrolMan  $patrolMan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, PatrolMan $patrolMan)
    {
        if($user->type === 'super_admin'){
            return true;
        }
        $role_user = $user->roles->first();
        if(!$role_user){
            return false;
        }
        $permission = $role_user->permissions()->where([
            ['parentCode','=','patrolman:mng'],
            ['code','=','delete_patrolman:mng']
        ])->first();
        return $permission && $patrolMan->organization_id === $user->organization_id ? true:false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PatrolMan  $patrolMan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, PatrolMan $patrolMan)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PatrolMan  $patrolMan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, PatrolMan $patrolMan)
    {
        //
    }
}
