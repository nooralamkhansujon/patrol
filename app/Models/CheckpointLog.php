<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckpointLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'checkpoint_id','device_id',
        'patrolman_id',
        'create_time'
    ];


    public function checkPoint(){
        return $this->belongsTo(CheckPoint::class,'checkpoint_id','id');
    }
    public function device()
    {
        return $this->belongsTo(Device::class,'device_id','id');
    }
    public function patrolman()
    {
       return $this->belongsTo(PatrolMan::class,'patrolman_id','id');
    }
}