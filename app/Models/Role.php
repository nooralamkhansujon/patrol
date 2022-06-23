<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable=['name','description'];

    public function permissions(){
        return $this->hasMany(RoleHasPermission::class,'role_id','id','id');
    }

    public function permission_types(){
        return $this->belongsToMany(PermissionType::class,'role_has_permissions','role_id','permission_type_id','id','id');
    }
}
