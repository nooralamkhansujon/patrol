<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatrolTask extends Model
{
    use HasFactory;
     //type 0 =daily,1=weekly,2=monthly,3=cycle

     //for cycle data
    //  name: krc routes task
    // lineId: 3
    // type: 3
    // cycle: 2
    // startDate: 1656093600000
    // endDate:
    // end of for cyle input dta
    protected $fillable=[
        'name',
        'route_id',
        'start_date',
        'end_date',
        'building',
        'cycle',
        'fri',
        'sat',
        'sun',
        'mon',
        'tue',
        'type',
        'wed','thu','reCreate'
    ];
}


 //for day route data
        // name: Route_excelit Company
        // lineId: 1
        // type: 0
        // startDate: 1656007200000
        // endDate:
        // mon: 1
        // tue: 1
        // wed: 1
        // thu: 1
        // fri: 1
        // sat: 1
        // sun: 1
        // dayPlanTimeData: [
        //     {"startTime":1517421600000,"endTime":1517432400000},
        //     {"startTime":1514755500000,"endTime":1514829600000}
        // ]
        // end of for  day route data
