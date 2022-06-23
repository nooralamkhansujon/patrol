<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeviceActivityResource;
use App\Http\Resources\DeviceResource;
use App\Models\Device;
use App\Models\DeviceRoute;
use App\Models\DeviceSetting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeviceController extends Controller
{
    public function index(){
        // $devices = Device::all();
        return view('patrol_managements.devices.index');
    }

    public function deviecSetting(Request $request)
    {
        $request->validate([
            'id'     => "required",
            'beep'     => "required",
            'clockGroupId'     => "required",
            'lineIds'     => "required",
            // 'patrolman_id'       => 'required',
            // 'description'    => 'required'
        ]);

        try{
            DB::beginTransaction();
            if($request->input('id')){
                $device = Device::find($request->input('id'));
                $deviceSetting = DeviceSetting::where('device_id',$device->id)->first();
                if(!$deviceSetting){
                    $deviceSetting = true;
                }
            }

            $data = array(
                'id'    => $request->input('id'),
                'sound' =>  $request->input('beep'),
            );
            if($request->has('clockGroupId') && $request->input('clockGroupId')){
                $data['clock'] = $request->input('clockGroupId');
             }

            if($deviceSetting === true){
                $deviceSetting = DeviceSetting::create($data);
            }else{
                $deviceSetting->update($data);
            }

            //first delete previous device routes
            DeviceRoute::where('device_id',$request->input('id'))->delete();
            $lineIds = json_decode($request->input('lineids'));
            foreach($lineIds as $line){
                $deviceLine = DeviceRoute::create([
                     'device_id'=>$request->input('id'),
                     'route_id'=> $line,
                ]);
            }
             DB::commit();
             return response()->json(['success'=>'Device Setting  has been Modified Successfully']);
        }catch(Exception $e){
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }

    public function getDevices(Request $request){
        $total = Device::count();
        $limit = $request->limit;
        $totalPage = (int) ceil($total/$limit);
        $offset    = $request->offset;
        $pageNum   = $offset == 0 ?1:$limit/$offset+1;
        $devices   = Device::with(['owner','organization','deviceActivities','deviceLines'])->skip($request->offset)->take($limit)->orderBy('id',$request->input('order'))->get();
        $devices   = DeviceResource::collection($devices);
        return response()->json(['rows'=>$devices,'pageNum'=>$pageNum,'pageSize'=>$limit,'total'=>$total,'totalPage'=>$totalPage]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'            => "required",
            'device_number'   => "required|unique:devices,device_number",
            'addCheckpoint'   => "required",
            'areaId' => 'required',
            // 'patrolman_id'       => 'required',
            // 'description'    => 'required'
        ]);

        //store organization;
        try{
            $data = array(
                'name'          =>  $request->input('name'),
                'device_number' =>  $request->input('device_number'),
                'organization_id'   =>  $request->input('areaId'),
                'mode'        =>  $request->input('addCheckpoint'),
                'description' => $request->has('description') && $request->input('description') ?  $request->input('description'):"",
            );
            if($request->has('patrolmanId') && $request->input('patrolmanId')){
               $data['patrolman_id'] = $request->input('patrolmanId');
            }
            Device::create($data);
            return response()->json(['success'=>'Device has been created Successfully']);
        }catch(Exception $e){
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }

    public function update(Request $request){
        $request->validate([
            'id'       => "required",
            'name'     => "required",
            'device_number'     => "required|unique:devices,device_number,".$request->input('id'),
            'addCheckpoint'              => "required",
            'areaId'   => 'required',
            // 'owner'          => 'required',
            // 'description'    => 'required'
            // 'last_scan_time' => 'required'
        ]);
        $device = Device::find($request->id);

        if (!$device) {
            return response()->json(['error'=>'Device not found'],404);
        }


         //store device;
         try{
            $data = array(
                'name'          =>  $request->input('name'),
                'device_number' =>  $request->input('device_number'),
                'organization_id'   =>  $request->input('areaId'),
                'mode'        =>  $request->input('addCheckpoint'),
                'description' => $request->has('description') && $request->input('description') ?  $request->input('description'):"",
            );
            if($request->has('patrolmanId') && $request->input('patrolmanId')){
                $data['patrolman_id'] = $request->input('patrolmanId');
             }
            $device->update($data);
            return response()->json(['success'=>'Device has been updated Successfully']);
        }catch(Exception $e){
            return response()->json(['error'=>$e->getMessage()],500);
        }

    }

    public function destroy()
    {
        $device = Device::find(request()->input('id'));
        if (!$device) {
            return response()->json(['error'=>'Device not found'],404);
        }
        try{
          $device->delete();
          return response()->json(['success'=>'Device has been Deleted Successfully']);
        }catch(Exception $e){
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }
}