<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;
    public  $rolePermission = ['role:mng','add_role:mng','modify_role:mng','delete_role:mng'];

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
        $permission = $role->permissions()->where('code','role:mng')->first();
        return $permission ? true:false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Role $role)
    {
        if($user->type === 'super_admin'){
            return true;
        }
        $role_user = $user->roles->first();
        if(!$role_user){
            return false;
        }
        $permission = $role_user->permissions()->where('code','role:mng')->first();
        return $permission && $role_user->id === $role->id ? true:false;
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
            ['parentCode','=','role:mng'],
            ['code','=','add_role:mng']
        ])->first();
        return $permission ? true:false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user,Role $role)
    {
        if($user->type === 'super_admin'){
            return true;
        }
        $role_user = $user->roles->first();
        if(!$role_user){
            return false;
        }
        $permission = $role_user->permissions()->where([
            ['parentCode','=','role:mng'],
            ['code','=','modify_role:mng']
        ])->first();
        return $permission && $role_user->id ==  $role->id? true:false;

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
            ['parentCode','=','role:mng'],
            ['code','=','modify_role:mng']
        ])->first();
        return $permission ? true:false;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Role $role)
    {
        if($user->type === 'super_admin'){
            return true;
        }
        $role_user = $user->roles->first();
        if(!$role_user){
            return false;
        }
        $permission = $role_user->permissions()->where([
            ['parentCode','=','role:mng'],
            ['code','=','delete_role:mng']
        ])->first();
        return $permission && $role->id == $role_user->id ? true:false;
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
            ['parentCode','=','role:mng'],
            ['code','=','delete_role:mng']
        ])->first();
        return $permission ? true:false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Role $role)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Role $role)
    {
        //
    }
}
