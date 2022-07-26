<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceActivity extends Model
{
    use HasFactory;
    protected $table = 'device_activities';
    protected $fillable=['last_scan_time','ele','device_id'];

    public function device(){
        return $this->belongsTo(Device::class,'device_id','id');
    }
}