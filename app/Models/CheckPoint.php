<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckPoint extends Model
{
    use HasFactory;
    protected $fillable = ['name','code_number','organization_id','description','creation_time'];

    public function organization(){
        return $this->belongsTo(Organization::class,'organization_id','id');
    }
}
