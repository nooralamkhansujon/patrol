<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceRoute extends Model
{
    use HasFactory;
    protected $fillable= ['device_id','route_id'];


    public function device(){
      return $this->belongsTo(Device::class,'device_id','id');
    }

    public function route(){
       return $this->belongsTo(Route::class,'route_id','id');
    }
}