<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrganizationResource;
use App\Models\Organization;
use Exception;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index(){
        $this->authorize('viewany',Organization::class);
        return view('organizations.departments.index');
    }

    public function getOrganizationsAjax(){

        if(auth()->user()->type === 'super_admin'){
            $organizations = Organization::all();
        }else{
            $organizations = Organization::where('id',auth()->user()->organization_id)->get();
        }
        $organizations = OrganizationResource::collection($organizations);
        return response()->json(['organizations'=>$organizations]);
    }

    public function store(Request $request)
    {
        // return $request->all();
        if(!auth()->user()->can('create',Organization::class)){
            return response()->json(['message','UnAuthorized '],403);
           }
        $request->validate([
            'name' =>"required",
            // 'description' => 'required',
            'parent_id'   => 'required'
        ]);

        //store organization;
        try{
            $organization_data = array(
                'name' => $request->input('name'),
                'description' => $request->input('description') ?? " ",
                'parent_id' => $request->input('parent_id'),
            );
            $organization= Organization::create($organization_data);
            return response()->json(['organization'=>$organization]);
        }catch(Exception $e){
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }

    public function update(Request $request,$organization_id){
        //
        $organization = Organization::find($organization_id);
        if(!$organization){
            $this->error("Organization Not Found");
            return redirect()->back();
        }
        if(!auth()->user()->can('update',$organization)){
            return response()->json(['message','UnAuthorized '],403);
        }
        $request->validate([
            'name'        =>  "required",
        ]);

         //store organization;
         try{
            $organization_data = array(
                'name' => $request->input('name'),
                'description' => $request->input('description') ?? " ",
            );
            $organization->update($organization_data);
            return response()->json(['organization'=>$organization]);
        }catch(Exception $e){
            return response()->json(['error'=>$e->getMessage()],500);
        }

    }

    public function destroy($organization_id)
    {
        $organization = Organization::find($organization_id);
        if(!$organization){
            return response()->json(['error'=>"Organization Not Found"],404);
        }
        if(!auth()->user()->can('delete',$organization)){
            return response()->json(['message','UnAuthorized '],403);
        }
        try{
            if($organization->parent_id === 0){
                return response()->json(['error'=>"Can't Delete Parent Organization"],404);
            }
          $organization->delete();
          return response()->json(['success'=>"Organization Deleted Successfully"]);
        }catch(Exception $e){
            $this->error($e->getMessage());
        }
    }
}
