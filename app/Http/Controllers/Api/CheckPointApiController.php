<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CheckPoint;
use App\Models\CheckpointLog;
use App\Models\Device;
use Illuminate\Http\Request;

class CheckPointApiController extends Controller
{
    public function deviceScan(Request $request){
        $data=$request->all();
        // info(gettype($data['data']));
        // info($request->all());
        $data = $request->input('data');
        // return response()->json(gettype($data));
        if(!isset($data['device_id'])){
            return response()->json(['error'=>'device Id Not Exists! '],404);
          }
        if(!isset($data['checkpoint_id'])){
            return response()->json(['error'=>'Checkpoint Id Not Exists! '],404);
        }
        if(!isset($data['timestamp'])){
            return response()->json(['error'=>'Timestamp Not Exists! '],404);
        }

        $device_id     = $data['device_id'];
        $checkpoint_id = $data['checkpoint_id'];
        $timestamp     = $data['timestamp'];

        $device        = Device::with('owner')->where('device_number',$device_id)->first();
        if(!$device){
            return response()->json(['error'=>'Device not exist with this device id '],404);
        }
        $checkpoint        = CheckPoint::where('code_number',$checkpoint_id)->first();
        if(!$checkpoint){
            return response()->json(['error'=>'Checkpoint not exist with checkpoint id'],404);
        }

        $checkpointLogData = array(
            'checkpoint_id' => $checkpoint->id,
            'device_id'     => $device->id,
            'checkpoint_id' => $checkpoint->id,
            'patrolman_id'  => $device?->owner?->id ? $device->owner?->id:null,
            'create_time'   => $timestamp
        );

        $device->update([
          'last_scan_time' => $timestamp
        ]);


        $checkpoint_log  = CheckpointLog::create($checkpointLogData);
       return response(['message'=>"successfully checkpoint log stored"]);
    }
}
