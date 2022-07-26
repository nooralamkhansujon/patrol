<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatrolManResource;
use App\Models\PatrolMan;
use Exception;
use Illuminate\Http\Request;

class PatrolManController extends Controller
{
    public function index(){
        $this->authorize('viewany',PatrolMan::class);
        $patrolmans = PatrolMan::all();
        return view('organizations.patrolmans.index',compact('patrolmans'));
    }
    public function getPatrolman(Request $request)
    {
        $limit = $request->limit;
        if(auth()->user()->type === 'super_admin'){
            $total     = PatrolMan::count();
        }else{
            $total     = PatrolMan::where('organization_id',auth()->user()->organization_id)->count();
        }
        $totalPage = (int) ceil($total/$limit);
        $offset = $request->offset;
        $pageNum = $offset == 0 ?1:$limit/$offset+1;
        if(auth()->user()->type === 'super_admin'){
            $patrolman = PatrolMan::skip($request->offset)->take($limit)->orderBy('id',$request->input('order'))->get();
        }else{
            $patrolman  = PatrolMan::skip($request->offset)->take($limit)->where([
              ['organization_id','=',auth()->user()->organization_id],
            ])->orderBy('id',$request->input('order'))->get();
        }
        $patrolman = PatrolManResource::collection($patrolman);
        // $users = User::all();
        return response()->json(['rows'=>$patrolman,'pageNum'=>$pageNum,'pageSize'=>$limit,'total'=>$total,'totalPage'=>$totalPage]);
    }

    public function listByAreaId(Request $request)
    {
        $patrolmans = PatrolMan::where('organization_id','=',$request->areaId)->get();
        if($patrolmans->count() == 0){
            return response()->json(['error'=>"Patrolman are not exist in this organization"]);
        }
        if(auth()->user()->type != 'super_admin' && auth()->user()->organization_id != $request->areaId){
            return response()->json(['message','UnAuthorized'],403);
        }
        return response()->json($patrolmans);
    }

    public function store(Request $request)
    {
       if(!auth()->user()->can('create',PatrolMan::class)){
        return response()->json(['message','UnAuthorized '],403);
       }
        $request->validate([
            'name' =>"required",
            'code_number' => 'required',
            'areaId'   => 'required',
            'description'   => 'required'
        ]);


        //oraganization based code number should be unique

        //store organization;
        try{
            $data=array(
                'name'          => $request->input('name'),
                'code_number'   => $request->input('code_number'),
                'organization_id' => $request->input('areaId'),
                'description'   => $request->input('description'),
             );
            PatrolMan::create($data);
            return response()->json(['success'=>'PatrolMan has been created Successfully']);
        }catch(Exception $e){
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }

    public function update(Request $request){
        $patrolman = PatrolMan::find($request->id);
        if (!$patrolman) {
            return response()->json(['error'=>'Patrol not found'],404);
        }
        if(!auth()->user()->can('update',$patrolman)){
            return response()->json(['message','UnAuthorized '],403);
        }
        $request->validate([
            'id'          => 'required',
            'name'        => "required",
            'code_number' => 'required',
            'areaId'      => 'required',
            'description' => 'required'
        ]);


         //store organization;
         try{
             $data=array(
                'name'          => $request->input('name'),
                'code_number'   => $request->input('code_number'),
                'organization_id' => $request->input('areaId'),
                'description'   => $request->input('description'),
             );
            $patrolman->update($data);
            return response()->json(['success'=>'PatrolMan has been updated successfully']);
        }catch(Exception $e){
            return response()->json(['success'=>$e->getMessage()],500);
        }

    }

    public function destroy(Request $request)
    {
        $patrolman = PatrolMan::find($request->id);
        if(!$patrolman){
            return response()->json(['error'=>'Patrolman not found'],404);
        }
         if(!auth()->user()->can('delete',$patrolman)){
            return response()->json(['message','UnAuthorized '],403);
        }
        try{
          $patrolman->delete();
          return response()->json(['success'=>"PatrolMan Deleted Successfully"]);
        }catch(Exception $e){
            return response()->json(['error'=>$e->getMessage()],404);
        }
    }
}