<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $fillable=['name','description','parent_id'];

    public function childrens(){
        return $this->hasMany(Organization::class,'parent_id','id');
    }

    public function routes(){
       return $this->hasMany(Route::class,'organization_id','id');
    }
}
