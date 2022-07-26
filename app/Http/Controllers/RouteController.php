<?php

namespace App\Http\Controllers;

use App\Http\Resources\RouteResource;
use App\Models\Route;
use Exception;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index(){
        $this->authorize('viewany',Route::class);
        return view('patrol_managements.routes.index');
    }

    public function getRoutes(Request $request)
    {
        $limit = $request->limit;
        if(auth()->user()->type === 'super_admin'){
            $total     = Route::count();
        }else{
            $total     = Route::where('organization_id',auth()->user()->organization_id)->count();
        }
        $totalPage = (int) ceil($total/$limit);
        $offset  = $request->offset;
        $pageNum = $offset == 0 ?1:$limit/$offset+1;
        if(auth()->user()->type === 'super_admin'){
            $routes  = Route::skip($request->offset)->take($limit)->orderBy('id',$request->input('order'))->get();
        }else{
            $routes     = Route::skip($request->offset)->take($limit)->where([
                ['organization_id','=',auth()->user()->organization_id],
              ])->orderBy('id',$request->input('order'))->get();
        }
        $routes = RouteResource::collection($routes);
        return response()->json(['rows'=>$routes,'pageNum'=>$pageNum,'pageSize'=>$limit,'total'=>$total,'totalPage'=>$totalPage]);
    }

    public function store(Request $request)
    {

        if(!auth()->user()->can('create',App\Models\Route::class)){
            return response()->json(['message','UnAuthorized '],403);
        }
        $request->validate([
            'name'     => "required",
            'areaId'   => 'required',
            'description'    => 'required'
        ]);


        //oraganization based code number should be unique
        //store organization;
        try {
            $data = array(
                'name'              =>  $request->input('name'),
                'organization_id'   =>  $request->input('areaId'),
                'description'       =>  $request->input('description'),
                'creation_time'       => now()
            );
            $route    = Route::create($data);
            return response()->json(['success'=>'Route has been created Successfully']);
        } catch (Exception $e) {
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }

    public function update(Request $request)
    {
        $route = Route::find($request->id);
        if (!$route) {
            return response()->json(['error'=>'Route not found'],404);
        }

        if(!auth()->user()->can('update',$route)){
            return response()->json(['message','UnAuthorized '],403);
        }

        $request->validate([
            'id'     => "required",
            'name'   => "required",
            'description'  => 'required'
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
        } catch (Exception $e) {
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }

    public function destroy()
    {
        $route = Route::find(request()->input('id'));
        if (!$route) {
            return response()->json(['error'=>'Route not found'],404);
        }
        if(!auth()->user()->can('delete',$route)){
            return response()->json(['message','UnAuthorized '],403);
        }

        try {
            $route->delete();
            return response()->json(['success'=>'Route has been Deleted Successfully']);
        } catch (Exception $e) {
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }
}
