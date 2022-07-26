<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatrolTaskResource;
use App\Models\Organization;
use App\Models\PatrolTask;
use App\Models\PlanTime;
use App\Models\Route;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  App\Helpers\PatrolTaskHelper;
use App\Http\Resources\RouteResource;

class PatrolTaskController extends Controller
{
    public function index(){
        $this->authorize('viewany',User::class);
        if(auth()->user()->type === 'super_admin'){
            $patrolTasks = PatrolTask::all();
        }else{
            $organization_id = auth()->user()->organization_id;
            $routes = Route::where('organization_id',$organization_id)->pluck('id');
            $patrolTasks = PatrolTask::whereIn('route_id',$routes)->get();
        }
        return view('patrol_managements.patrol_task.index',compact('patrolTasks'));
    }
    public function getPatrolTask(Request $request)
    {
        $limit     = $request->limit;
        if(auth()->user()->type === 'super_admin'){
            $total     = PatrolTask::count();
        }else{
            $organization_id = auth()->user()->organization_id;
            $routes = Route::where('organization_id',$organization_id)->pluck('id');
            $total = PatrolTask::whereIn('route_id',$routes)->count();
        }
        $totalPage = (int) ceil($total/$limit);
        $offset = $request->offset;
        $pageNum = $offset == 0 ?1:$limit/$offset+1;
        if(auth()->user()->type === 'super_admin'){
            $patrolsTasks     = PatrolTask::skip($request->offset)->take($limit)->where([
            ['type','<>','super_admin']])->orderBy('id',$request->input('order'))->get();
        }else{
            $organization_id = auth()->user()->organization_id;
            $routes = Route::where('organization_id',$organization_id)->pluck('id');
            $patrolsTasks     = PatrolTask::skip($request->offset)->take($limit)->whereIn('route_id',$routes)->orderBy('id',$request->input('order'))->get();
        }

        $patrolsTasks = PatrolTaskResource::collection($patrolsTasks);
        // $users = User::all();
        return response()->json(['rows'=>$patrolsTasks,'pageNum'=>$pageNum,'pageSize'=>$limit,'total'=>$total,'totalPage'=>$totalPage]);
    }

    public function routeLineTree(Request $request){
        // $lineTree = Route::with('organizations')->get();
        if(auth()->user()->type === 'super_admin'){
            $organizationRoutes = Organization::with('routes')->get();
        }else{
            $organizationRoutes = Organization::with('routes')->where('id',auth()->user()->organization_id)->get();
        }
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
    public function getRoutes(Request $request)
    {
        $limit = $request->limit;
        $limit     = $request->limit;
        if(auth()->user()->type === 'super_admin'){
            $total     = Route::count();
        }else{
            $total     = Route::where('organization_id',auth()->user()->organization_id)->count();
        }
        $totalPage = (int) ceil($total/$limit);
        $offset  = $request->offset;
        $pageNum = $offset == 0 ?1:$limit/$offset+1;
        if(auth()->user()->type === 'super_admin'){
            $routes  = Route::skip($request->offset)->take($limit)->get();
        }else{
            $routes     = Route::skip($request->offset)->take($limit)->where([
                ['organization_id','=',auth()->user()->organization_id],
              ])->get();
        }
        $routes = RouteResource::collection($routes);
        return response()->json(['rows'=>$routes,'pageNum'=>$pageNum,'pageSize'=>$limit,'total'=>$total,'totalPage'=>$totalPage]);
    }
    // public function listByAreaId(Request $request)
    // {
    //     $patrolmans = PatrolTask::where('organization_id',$request->areaId)->get();
    //     if($patrolmans->count() == 0){
    //         return response()->json(['error'=>"Patrolman are not exist in this organization"]);
    //     }
    //     return response()->json($patrolmans);
    // }

    public function store(Request $request)
    {
        if(!auth()->user()->can('create',PatrolTask::class)){
            return response()->json(['message','UnAuthorized '],403);
        }
        // return $request->all();
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
            info(gettype($request->input('type')));
            if($request->input('type') == 0 ){
                info('I am running from 0');
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
                $response = PatrolTaskHelper::storeTaskDaily($request);
                if($response['error']){
                    return response(['error'=>$response['message']],500);
                }
            }

            elseif($request->input('type') == 2 || $request->input('type') == 1){
              $response = PatrolTaskHelper::taskMonthlyOrWeekly($request);
              if($response['error']){
                return response(['error'=>$response['message']],500);
            }
            }

            elseif($request->input('type') == 3){
                //for weekly task
                $response = PatrolTaskHelper::taskCycle($request);
                if($response['error']){
                    return response(['error'=>$response['message']],500);
                }
            }
            return response()->json(['success'=>'PatrolTask has been created Successfully']);
        }catch(Exception $e){
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
        if(!auth()->user()->can('update',$patrolTask)){
            return response()->json(['message','UnAuthorized '],403);
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
        if(!auth()->user()->can('delete',$patrolTask)){
            return response()->json(['message','UnAuthorized '],403);
        }
        try{
          $patrolTask->delete();
          return response()->json(['success'=>"PatrolTask Deleted Successfully"]);
        }catch(Exception $e){
            return response()->json(['error'=>$e->getMessage()],404);
        }
    }
}