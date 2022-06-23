<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatrolMan extends Model
{
    use HasFactory;
    protected $table = 'patrol_mens';
    protected $fillable =['name','code_number','organization_id','description'];

    public function organization(){
        return $this->belongsTo(Organization::class,'organization_id','id');
    }
}