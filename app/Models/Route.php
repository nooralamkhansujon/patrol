<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    protected $fillable=['name','organization_id','description','creation_time','order_num'];

    public function organization(){
      return $this->belongsTo(Organization::class,'organization_id','id');
    }

    public function CheckPoints(){
        return $this->hasMany(RouteCheckpoint::class,'route_id','id');
    }
}
