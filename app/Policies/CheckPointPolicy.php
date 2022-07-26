<?php

namespace App\Policies;

use App\Models\CheckPoint;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CheckPointPolicy
{
    use HandlesAuthorization;

    public  $rolePermission = ['checkpoint:mng','add_checkpoint:mng','modify_checkpoint:mng','delete_checkpoint:mng'];

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
        $permission = $role->permissions()->where('code','checkpoint:mng')->first();
        return $permission ? true:false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CheckPoint  $checkPoint
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, CheckPoint $checkPoint)
    {
        if($user->type === 'super_admin'){
            return true;
        }
        $role_user = $user->roles->first();
        if(!$role_user){
            return false;
        }
        $permission = $role_user->permissions()->where('code','role:mng')->first();
        return $permission && $user->organization_id === $checkPoint->organization_id ? true:false;
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
            ['parentCode','=','checkpoint:mng'],
            ['code','=','add_checkpoint:mng']
        ])->first();
        return $permission ? true:false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CheckPoint  $checkPoint
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, CheckPoint $checkPoint)
    {
        if($user->type === 'super_admin'){
            return true;
        }
        $role_user = $user->roles->first();
        if(!$role_user){
            return false;
        }
        $permission = $role_user->permissions()->where([
            ['parentCode','=','checkpoint:mng'],
            ['code','=','modify_checkpoint:mng']
        ])->first();
        return $permission && $user->organization_id === $checkPoint->organization_id ? true:false;
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
            ['parentCode','=','checkpoint:mng'],
            ['code','=','modify_checkpoint:mng']
        ])->first();
        return $permission ? true:false;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CheckPoint  $checkPoint
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, CheckPoint $checkPoint)
    {
        if($user->type === 'super_admin'){
            return true;
        }
        $role_user = $user->roles->first();
        if(!$role_user){
            return false;
        }
        $permission = $role_user->permissions()->where([
            ['parentCode','=','checkpoint:mng'],
            ['code','=','delete_checkpoint:mng']
        ])->first();
        return $permission && $user->organization_id === $checkPoint->organization_id ? true:false;
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
            ['parentCode','=','checkpoint:mng'],
            ['code','=','delete_checkpoint:mng']
        ])->first();
        return $permission ? true:false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CheckPoint  $checkPoint
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, CheckPoint $checkPoint)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CheckPoint  $checkPoint
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, CheckPoint $checkPoint)
    {
        //
    }
}