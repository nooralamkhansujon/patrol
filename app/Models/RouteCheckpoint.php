<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteCheckpoint extends Model
{
    use HasFactory;
    protected $fillable = ['checkpoint_id','route_id','interval'];

    public function checkpoint(){
        return $this->belongsTo(CheckPoint::class,'checkpoint_id','id');
    }

    public function route(){
        return $this->belongsTo(Route::class,'route_id','id');
    }
}
