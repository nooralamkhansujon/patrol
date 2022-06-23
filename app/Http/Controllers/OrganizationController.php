<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrganizationResource;
use App\Models\Organization;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Expr;

class OrganizationController extends Controller
{
    public function index(){
        $organization = Organization::with('childrens')->where('parent_id',0)->first();
        // dd($organization);
        return view('organizations.departments.index',compact('organization'));
    }

    public function getOrganizationsAjax(){
        $organizations = OrganizationResource::collection(Organization::all());
        return response()->json(['organizations'=>$organizations]);
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' =>"required",
            'description' => 'required',
            'parent_id'   => 'required'
        ]);

        //store organization;
        try{

            $organization= Organization::create($request->all());
            return response()->json(['organization'=>$organization]);
            // $this->success('Organization has been created successfully');
        }catch(Exception $e){
            $this->error($e->getMessage());
           return redirect()->back();
        }
    }

    public function update(Request $request,$organization_id){
        //
        $organization = Organization::find($organization_id);
        if(!$organization){
            $this->error("Organization Not Found");
            return redirect()->back();
        }
        $request->validate([
            'name' =>"required",
            'description' => 'required',
            // 'parent_id'   => 'required'
        ]);

         //store organization;
         try{
            $organization->update($request->all());
            return response()->json(['organization'=>$organization]);
            // $this->success('Organization has been created successfully');
        }catch(Exception $e){
            // $this->error($e->getMessage());
           return response()->json($e->getMessage());
        }

    }

    public function destroy($organization_id)
    {
        $organization = Organization::find($organization_id);
        if(!$organization){
            return response()->json(['error'=>"Organization Not Found"],404);
        }
        try{
            if($organization->parent_id === 0){
                return response()->json(['error'=>"Can't Delete Parent Organization"],404);
            }
          $organization->delete();
          return response()->json(['success'=>"Organization Deleted Successfully"]);
        //   $this->success();
        }catch(Exception $e){
            $this->error($e->getMessage());
        }
    }
}
