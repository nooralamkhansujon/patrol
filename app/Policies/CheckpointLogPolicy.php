<?php

namespace App\Policies;

use App\Models\CheckpointLog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CheckpointLogPolicy
{
    use HandlesAuthorization;
    public $rolePermission = ['attendance_view_records:mng','view_records:root'];
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
        $permission = $role->permissions()->where('code','attendance_view_records:mng')->first();
        return $permission ? true:false;

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CheckpointLog.php  $checkpointLog.php
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, CheckpointLog $checkpointLog)
    {
        if($user->type === 'super_admin'){
            return true;
        }
        $role_user = $user->roles->first();
        if(!$role_user){
            return false;
        }
        $permission = $role_user->permissions()->where('code','department:mng')->first();
        return $permission && $user->organization_id === $checkpointLog?->device?->organization_id ? true:false;
    }
}