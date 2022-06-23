<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanTime extends Model
{
    use HasFactory;
    //type 0 =daily,1=weekly,2=monthly,3=cycle
    protected $fillable=[
        'task_id',
        'start_time',
         'end_time',
    ];


}
