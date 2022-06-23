<?php

namespace App\Http\Controllers;

use App\Http\Resources\RouteResource;
use App\Models\Route;
use Exception;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index(){
        return view('patrol_managements.routes.index');
    }

    public function getRoutes(Request $request)
    {
        $total = Route::count();
        $limit = $request->limit;
        $totalPage = (int) ceil($total/$limit);
        $offset  = $request->offset;
        $pageNum = $offset == 0 ?1:$limit/$offset+1;
        $routes  = Route::skip($request->offset)->take($limit)->orderBy('id',$request->input('order'))->get();
        $routes = RouteResource::collection($routes);
        return response()->json(['rows'=>$routes,'pageNum'=>$pageNum,'pageSize'=>$limit,'total'=>$total,'totalPage'=>$totalPage]);
    }

    public function store(Request $request)
    {
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
        try {
            $route->delete();
            return response()->json(['success'=>'Route has been Deleted Successfully']);
        } catch (Exception $e) {
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }
}
