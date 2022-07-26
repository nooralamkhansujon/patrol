<?php

namespace App\Http\Controllers;

use App\Http\Resources\CheckPointLogResource;
use App\Http\Resources\CheckPointResource;
use App\Models\CheckpointLog;
use App\Models\Device;
use App\Models\PatrolMan;
use Illuminate\Http\Request;
use App\Models\CheckPoint;

class CheckpointLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewany',CheckpointLog::class);
        if(auth()->user()->type === 'super_admin'){
            $devices = Device::all();
            $patrolmens = PatrolMan::all();
        }else{
            $devices  = Device::where(
               'organization_id',auth()->user()->organization_id)->get();
            $patrolmens = PatrolMan::where(
                'organization_id',auth()->user()->organization_id)->get();
        }
      return view('check_records.attendance.index',compact('devices','patrolmens'));
    }

    public function getCheckPointLogs(Request $request)
    {
        $limit = $request->limit;
        if(auth()->user()->type === 'super_admin'){
            $total = CheckpointLog::count();
        }else{
            $device_ids  = Device::where('organization_id',auth()->user()->organization_id)->pluck('id');
            info($device_ids);
            $total     = CheckpointLog::whereIn('device_id',$device_ids)->count();
        }

        $totalPage = (int) ceil($total/$limit);
        $offset = $request->offset;
        $pageNum = $offset == 0 ?1:$limit/$offset+1;

        if(auth()->user()->type === 'super_admin'){
            $checkpointsLogs  = CheckpointLog::with(['checkPoint','device','patrolman'])->skip($request->offset)->take($limit)->orderBy('id',$request->input('order'))->get();
        }else{
            $checkpointsLogs     = CheckpointLog::with(['checkPoint','device','patrolman'])->skip($request->offset)->take($limit)->whereIn('device_id',$device_ids)->orderBy('id',$request->input('order'))->get();
        }
        $checkpointsLogs = CheckPointLogResource::collection($checkpointsLogs);
        return response()->json(['rows'=>$checkpointsLogs,'pageNum'=>$pageNum,'pageSize'=>$limit,'total'=>$total,'totalPage'=>$totalPage]);
    }


    public function getCheckpoints(Request $request)
    {
        $total = CheckPoint::count();
        $limit = $request->limit;
        $totalPage = (int) ceil($total/$limit);
        $offset = $request->offset;
        $pageNum = $offset == 0 ?1:$limit/$offset+1;
        $checkpoints = CheckPoint::skip($request->offset)->take($limit)->get();
        $checkpoints = CheckPointResource::collection($checkpoints);
        return response()->json(['rows'=>$checkpoints,'pageNum'=>$pageNum,'pageSize'=>$limit,'total'=>$total,'totalPage'=>$totalPage]);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CheckpointLog  $checkpointLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CheckpointLog $checkpointLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CheckpointLog  $checkpointLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckpointLog $checkpointLog)
    {
        //
    }
}
