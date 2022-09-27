<?php
namespace App\Helpers;
use App\Models\PatrolTask;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatrolTaskHelper{

    public static function storeTaskDaily(Request $request){
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
        try{
            DB::beginTransaction();
            $patrolTaskData = array(
                'name'         => $request->input('name'),
                'route_id'     => $request->input('lineId'),
                'start_date'   => (int)$request->input('startDate'),
                'end_date'     => $request->input('endDate') ?? null,
                // 'building'     => null,
                // 'cycle'        => null,
                'fri'          => $request->input('fri'),
                'sat'          => $request->input('sat'),
                'sun'          => $request->input('sun'),
                'mon'          => $request->input('mon'),
                'tue'          => $request->input('tue'),
                'type'       => $request->input('type'),
                'wed'        => $request->input('wed'),
                'thu'        => $request->input('thu'),
                'reCreate'   => '0000'
            );
            $patrolTask = PatrolTask::create($patrolTaskData);
            $planTimes = array();
            $dayPlanTimeData = json_decode($request->input('dayPlanTimeData'));
            foreach( $dayPlanTimeData as $planTime){
                array_push($planTimes,[
                   'start_time' => $planTime->startTime,
                   'end_time'   => $planTime->endTime,
                ]);
            }
            $patrolTask->planTimes()->createMany($planTimes);
            DB::commit();
            return ['error'=>false];
        }catch(Exception $e){
            DB::rollBack();
            return ['error'=> true,'message'=>$e->getMessage()];
        }

    }
    public static function updateTaskDaily($patrolTask,Request $request){
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
        try{
            DB::beginTransaction();
            $patrolTaskData = array(
                'name'         => $request->input('name'),
                'route_id'     => $request->input('lineId'),
                'start_date'   => (int)$request->input('startDate'),
                'end_date'     => $request->input('endDate') ?? null,
                // 'building'     => null,
                // 'cycle'        => null,
                'fri'          => $request->input('fri'),
                'sat'          => $request->input('sat'),
                'sun'          => $request->input('sun'),
                'mon'          => $request->input('mon'),
                'tue'          => $request->input('tue'),
                'type'       => $request->input('type'),
                'wed'        => $request->input('wed'),
                'thu'        => $request->input('thu'),
                'reCreate'   => '0000'
            );
            $patrolTask->update($patrolTaskData);
            $planTimes = array();
            $dayPlanTimeData = json_decode($request->input('dayPlanTimeData'));
            foreach( $dayPlanTimeData as $planTime){
                array_push($planTimes,[
                   'start_time' => $planTime->startTime,
                   'end_time'   => $planTime->endTime,
                ]);
            }
            $patrolTask->planTimes()->delete();
            $patrolTask->planTimes()->createMany($planTimes);
            DB::commit();
            return ['error'=>false];
        }catch(Exception $e){
            DB::rollBack();
            return ['error'=> true,'message'=>$e->getMessage()];
        }

    }

    public static function taskMonthlyOrWeekly(Request $request){
         // for month
        // name: route task excelit
        // lineId: 1
        // type: 2
        // building: 1
        // end of for month
        try{
            DB::beginTransaction();
            $patrolTaskData = array(
                'name' => $request->input('name'),
                'route_id' => $request->input('lineId'),
                'building'   => $request->input('building'),
                'type'       => $request->input('type'),
                'reCreate'   => now()
            );
            PatrolTask::create($patrolTaskData);
            DB::commit();
            return ['error'=>false];
        }catch(Exception $e){
            DB::rollBack();
            return ['error'=> true,'message'=>$e->getMessage()];
        }
    }
    public static function updateTaskMonthlyOrWeekly($patrol_task,Request $request){
         // for month
        // name: route task excelit
        // lineId: 1
        // type: 2
        // building: 1
        // end of for month
        try{
            DB::beginTransaction();
            $patrolTaskData = array(
                'name' => $request->input('name'),
                'route_id' => $request->input('lineId'),
                'building'   => $request->input('building'),
                'type'       => $request->input('type'),
                'reCreate'   => now()
            );
            $patrol_task->update($patrolTaskData);
            DB::commit();
            return ['error'=>false];
        }catch(Exception $e){
            DB::rollBack();
            return ['error'=> true,'message'=>$e->getMessage()];
        }
    }
    public static function taskCycle(Request $request){
         //for cycle data
        //  name: krc routes task
        // lineId: 3
        // type: 3
        // cycle: 2
        // startDate: 1656093600000
        // endDate:
        // end of for cyle input dta

        try{
            DB::beginTransaction();
            $patrolTaskData = array(
                'name'        => $request->input('name'),
                'route_id'    => $request->input('lineId'),
                'type'        => $request->input('type'),
                'cycle'       => $request->input('cycle'),
                'start_date'  => (int) $request->input('startDate'),
                'end_date'       => $request->input('endDate')?$request->input('endDate'):null,
                'reCreate'   => now()
            );
            PatrolTask::create($patrolTaskData);
            DB::commit();
            return ['error'=>false];
        }catch(Exception $e){
            DB::rollBack();
            return ['error'=> true,'message'=>$e->getMessage()];
        }
    }
    public static function updateTaskCycle($patrol_task,Request $request){
         //for cycle data
        //  name: krc routes task
        // lineId: 3
        // type: 3
        // cycle: 2
        // startDate: 1656093600000
        // endDate:
        // end of for cyle input dta

        try{
            DB::beginTransaction();
            $patrolTaskData = array(
                'name'        => $request->input('name'),
                'route_id'    => $request->input('lineId'),
                'type'        => $request->input('type'),
                'cycle'       => $request->input('cycle'),
                'start_date'  => (int) $request->input('startDate'),
                'end_date'       => $request->input('endDate')?$request->input('endDate'):null,
                'reCreate'   => now()
            );
            $patrol_task->update($patrolTaskData);
            DB::commit();
            return ['error'=>false];
        }catch(Exception $e){
            DB::rollBack();
            return ['error'=> true,'message'=>$e->getMessage()];
        }
    }


    private static  function  formatDate($timestamp){
        $timestamp =(int) $timestamp;
        $datetimeFormat = 'Y-m-d H:i:s';

        $date = new \DateTime();
        // If you must have use time zones
        // $date = new \DateTime('now', new \DateTimeZone('Europe/Helsinki'));
        $date->setTimestamp($timestamp);
        return $date->format($datetimeFormat);
    }


}
