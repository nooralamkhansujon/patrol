<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $fillable=['name','device_number','mode','organization_id','patrolman_id','description'];//mode = addcheckpoint

    public function organization(){
        return $this->belongsTo(Organization::class,'organization_id','id');
    }

    public function owner(){
        return $this->belongsTo(PatrolMan::class,'patrolman_id','id');
    }

    public function deviceSetting(){
        return $this->hasOne(DeviceSetting::class,'device_id','id');
    }

    public function deviceActivities(){
        return $this->hasMany(DeviceActivity::class,'device_id','id');
    }
    public function deviceLines(){
        return $this->hasMany(DeviceRoute::class,'device_id','id');
    }



}
