<?php

namespace App\Http\Controllers;

use App\Http\Resources\CheckPointResource;
use App\Models\CheckPoint;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckPointController extends Controller
{
    public function index()
    {
        return view('patrol_managements.checkpoint.index');
    }

    public function getCheckpoints(Request $request)
    {
        $total = CheckPoint::count();
        $limit = $request->limit;
        $totalPage = (int) ceil($total/$limit);
        $offset = $request->offset;
        $pageNum = $offset == 0 ?1:$limit/$offset+1;
        $checkpoints = CheckPoint::skip($request->offset)->take($limit)->orderBy('id',$request->input('order'))->get();
        $checkpoints = CheckPointResource::collection($checkpoints);
        return response()->json(['rows'=>$checkpoints,'pageNum'=>$pageNum,'pageSize'=>$limit,'total'=>$total,'totalPage'=>$totalPage]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'           => "required",
            'code_number'    => "required",
            'areaId'         => 'required',
            'description'    => 'required',
        ]);
        //store organization;
        try {
            DB::beginTransaction();
            $data = array(
                'name'             => $request->input('name'),
                'code_number'      => $request->input('code_number'),
                'organization_id'  => $request->input('areaId'),
                'description'      => $request->input('description'),
                'creation_time'  =>  now()
            );
            $checkpoint  = CheckPoint::create($data);
            DB::commit();
            return response()->json(['success'=>'Checkpoint has been created Successfully']);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }

    public function update(Request $request)
    {
        $checkpoint = CheckPoint::find($request->id);
        if (!$checkpoint) {
            return response()->json(['error'=>'Checkpoint not found'],404);
        }
        $request->validate([
            'id'       => 'required',
            'name'     => "required",
            'code_number'    => "required",
            'areaId'   => 'required',
            'description'     => 'required',
        ]);

        //store organization;
        try {

            DB::beginTransaction();
            $data = array(
                'name'             => $request->input('name'),
                'code_number'      => $request->input('code_number'),
                'organization_id'  => $request->input('areaId'),
                'description'      => $request->input('description'),
                'creation_time'  =>  now()
            );
            $checkpoint->update($data);
            DB::commit();
            return response()->json(['success'=>'Checkpoint has been Updated Successfully']);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }

    public function destroy()
    {
        $checkpoint = CheckPoint::find(request()->input('id'));
        if (!$checkpoint) {
            return response()->json(['error'=>'Checkpoint not found'],404);
        }
        try {
            $checkpoint->delete();
            return response()->json(['success'=>'Checkpoint has been Deleted Successfully']);
        } catch (Exception $e) {
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
}
