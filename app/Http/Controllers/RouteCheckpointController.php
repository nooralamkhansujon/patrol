<?php

namespace App\Http\Controllers;

use App\Http\Resources\RouteCheckpointResource;
use App\Models\CheckPoint;
use App\Models\Route;
use App\Models\RouteCheckpoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\VersionUpdater\Checker;

class RouteCheckpointController extends Controller
{
    public function index($route_id){
        // dd($route_id);
        $route = Route::find((int)$route_id);
        if(!$route){
            return response()->json(['error'=>'Route not found'],404);
        }
        // $route_checkpoints = RouteCheckpoint::where([
        //     ['route_id','=',$route_id],
        // ])->get();
        return view('patrol_managements.routes.route_checkpoints',compact('route'));
    }

    public function listByLineNotExist(){
        $route = Route::with('CheckPoints')->find(request()->lineId);
        $checkpointIds = $route->CheckPoints->pluck('checkpoint_id');
        // dd($checkpointIds);
        $checkPoints = CheckPoint::where([['organization_id','=',$route->organization_id]])->whereNotIn('id',$checkpointIds)->get();
        // dd($checkPoints);
        return response()->json($checkPoints);
    }


    public function getRouteCheckpoints(Request $request)
    {
        $routeCheckpoint  = RouteCheckpoint::with('checkpoint')->where([
            ['route_id','=',$request->input('lineId')],
        ])->orderBy('id', $request->input('order'))->get();

        $routeCheckpoint = RouteCheckpointResource::collection($routeCheckpoint);
        return response()->json($routeCheckpoint);
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'checkpointIds'   => 'required',
            'route_id'    => 'required'
        ]);
        $route    = Route::find($request->route_id);
        $checkpoints = json_decode($request->checkpointIds);
        // dd($checkpoints);
        if(!$route){
            return response(['error'=>"Route Not Found"],404);
        }

        //oraganization based code number should be unique
        //store organization;
        try {
            DB::beginTransaction();
            $order_num = $route->CheckPoints->count();
            foreach($checkpoints as $checkpoint){
                 $route_checkpoint = RouteCheckpoint::create([
                      'route_id'=>$route->id,
                      'checkpoint_id'=>$checkpoint,
                      'order_num'=>++$order_num
                 ]);
            }
            DB::commit();
            return response()->json(['success'=>'Route Checkpoint has been created Successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }

    public function update(Request $request)
    {
        $route = Route::find($request->id);
        if (!$route) {
            return response()->json(['error'=>'Route not found'],404);
        }
        $request->validate([
            'id'     => "required",
            'name'     => "required",
            'checkpointIds'   => 'required',
            'route_id'    => 'required'
        ]);
        //'areaId' => 'required',
        //store organization;
        try {
            $data = array(
                'name'     =>  $request->input('name'),
                'description'  =>  $request->input('description'),
                'creation_time'  => now()
            );
            $route->update($data);
            return response()->json(['success'=>'Route has been Update Successfully']);
        } catch (\Exception $e) {
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }

    public function destroy()
    {
        $routecheckpoint = RouteCheckpoint::find(request()->input('id'));
        if (!$routecheckpoint) {
            return response()->json(['error'=>'Route not found'],404);
        }
        try {
            $routecheckpoint->delete();
            return response()->json(['success'=>'Route has been Deleted Successfully']);
        } catch (\Exception $e) {
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }

}