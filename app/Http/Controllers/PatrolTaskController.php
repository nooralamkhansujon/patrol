<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatrolTaskResource;
use App\Models\Organization;
use App\Models\PatrolTask;
use App\Models\PlanTime;
use App\Models\Route;
use Exception;
use Illuminate\Http\Request;

class PatrolTaskController extends Controller
{
    public function index(){
        $patrolTasks = PatrolTask::all();
        return view('patrol_managements.patrol_task.index',compact('patrolTasks'));
    }
    public function getPatrolTask(Request $request)
    {
        $total = PatrolTask::count();
        $limit = $request->limit;
        $totalPage = (int) ceil($total/$limit);
        $offset = $request->offset;
        $pageNum = $offset == 0 ?1:$limit/$offset+1;
        $patrolsTasks = PatrolTask::skip($request->offset)->take($limit)->orderBy('id',$request->input('order'))->get();
        $patrolsTasks = PatrolTaskResource::collection($patrolsTasks);
        // $users = User::all();
        return response()->json(['rows'=>$patrolsTasks,'pageNum'=>$pageNum,'pageSize'=>$limit,'total'=>$total,'totalPage'=>$totalPage]);
    }

    public function routeLineTree(Request $request){
        // $lineTree = Route::with('organizations')->get();
        $organizationRoutes = Organization::with('routes')->get();
        //now I have to bind as array
        $lineTrees = collect([]);
        foreach($organizationRoutes as $organization){

            if($organization->routes->count()){
                $lineTrees->push([
                    'id'   => 'a-'.$organization->id,
                    'name' =>$organization->name,
                     'dataId'=>$organization->id ?? null,
                    'title'=>$organization->name,
                    'pId' =>isset($organization->parent_id)?'a-'.$organization->parent_id : null,
                    'icon' => null,
                    'open'=>true,
                    'title'=>$organization->name,
                    'nocheck'=>false,
                    'isParent' =>false,
                    'children'=>[],
                    'icon'=>null,
                    'typeId'=>0
                ]);
                foreach($organization->routes as $route){
                    $lineTrees->push([
                        'id'   => 'l-'.$route->id,
                        'name' =>$route->name,
                        'title'=>$route->name,
                        'pId' =>'a-'.$route->organization_id,
                        'icon' => null,
                        'open'=>true,
                        'title'=>null,
                        'nocheck'=>false,
                        'isParent' =>false,
                        'children'=>[],
                        'dataId'=> $route->id,
                        'icon'=>null,
                        'typeId'=>1
                    ]);
                }
            }
        }
        return response()->json(compact('lineTrees'));
    }

    public function listByAreaId(Request $request)
    {
        $patrolmans = PatrolTask::where('organization_id',$request->areaId)->get();
        if($patrolmans->count() == 0){
            return response()->json(['error'=>"Patrolman are not exist in this organization"]);
        }
        return response()->json($patrolmans);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>"required",
            'code_number' => 'required',
            'areaId'   => 'required',
            'description'   => 'required'
        ]);

        //for cycle data
        //  name: krc routes task
        // lineId: 3
        // type: 3
        // cycle: 2
        // startDate: 1656093600000
        // endDate:
        // end of for cyle input dta

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

        //for  weeks
        // name: Route_excelit Company
        // lineId: 2
        // type: 1
        // building: 1
        //end of for weeks

        // for month
        // name: route task excelit
        // lineId: 1
        // type: 2
        // building: 1
        // end of for month


        //oraganization based code number should be unique

        //store organization;
        try{
            if($request->input('type') == 0 ){
                $request->validate([
                   'name' =>'required',
                   'lineId' =>'required',
                    'startDate' =>'required',
                    'mon' =>'required',
                    'tue' =>'required',
                    'wed' =>'required',
                    'thu' =>'required',
                    'fri' =>'required',
                    'sat' =>'required',
                    'sun' =>'required',
                    'dayPlanTimeData' => 'required',
                ]);
                $data = array(
                    'name' => $request->input('name'),
                    'route_id' => $request->input('lineId'),
                    'start_date' => $request->input('name'),
                    'end_date' => $request->input('end_date') ? $request->input('end_date'):null,
                    'tue' => $request->input('tue'),
                    'wed' => $request->input('wed'),
                    'thu' => $request->input('thu'),
                    'fri' => $request->input('fri'),
                    'sat' => $request->input('sat'),
                    'sun' => $request->input('sun'),
                );
                $patrolTask = PatrolTask::create($data);
                foreach($request->input('dayPlanTimeData') as $planTime){
                    $planData = array(
                        'task_id'   => $patrolTask->id,
                        'start_time'   => $planTime->startTime,
                         'end_time'   => $patrolTask->endTime,
                    );
                    $plan = PlanTime::create($planData);
                }
            }
            PatrolTask::create($data);
            return response()->json(['success'=>'PatrolTask has been created Successfully']);
        }catch(Exception $e){
            // $this->error($e->getMessage());
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }

    public function update(Request $request){
        $request->validate([
            'id'          => 'required',
            'name'        => "required",
            'code_number' => 'required',
            'areaId'      => 'required',
            'description' => 'required'
        ]);
        $patrolTask = PatrolTask::find($request->id);
        if (!$patrolTask) {
            return response()->json(['error'=>'Patrol Task not found'],404);
        }

         //store organization;
         try{
             $data=array(
                'name'          => $request->input('name'),
                'code_number'   => $request->input('code_number'),
                'organization_id' => $request->input('areaId'),
                'description'   => $request->input('description'),
             );
            $patrolTask->update($data);
            return response()->json(['success'=>'PatrolTask has been updated successfully']);
        }catch(Exception $e){
            return response()->json(['success'=>$e->getMessage()],500);
        }

    }

    public function destroy(Request $request)
    {
        $patrolTask = PatrolTask::find($request->id);
        if(!$patrolTask){
            return response()->json(['error'=>'PatrolTask not found'],404);
        }
        try{
          $patrolTask->delete();
          return response()->json(['success'=>"PatrolTask Deleted Successfully"]);
        }catch(Exception $e){
            return response()->json(['error'=>$e->getMessage()],404);
        }
    }
}
