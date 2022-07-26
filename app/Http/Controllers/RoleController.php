<?php

namespace App\Http\Controllers;

use App\Http\Resources\PermissionResource;
use App\Http\Resources\RoleResource;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Role;
use Exception;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('viewany',Role::class);
        if(auth()->user()->type === 'super_admin'){
            $roles = Role::latest()->get();
        }else{
            $roles =  auth()->user()->roles;
        }
        return view('organizations.roles.index', compact('roles'));
    }
    public function getRole(Request $request)
    {
        $role =Role::with('permissions')->find($request->id);

        if (!$role) {
            return response()->json(['error' => "Role Not Found"], 404);
        }
        if(!auth()->user()->can('view',$role)){
            return response()->json(['message','UnAuthorized '],403);
        }
        $role = new RoleResource($role,true);
        return response()->json(compact('role'));
    }
    public function getRolesAjax()
    {
        $roles = RoleResource::collection(Role::orderBy('id', 'desc')->get());
        return response()->json($roles);
    }

    public function getPermissionsAjax()
    {
        $permissions = PermissionResource::collection(Permission::all());
        return response()->json(compact('permissions'));
    }

    public function store(Request $request)
    {
       if(!auth()->user()->can('create',App\Models\Role::class)){
        return response()->json(['message','UnAuthorized '],403);
       }
        $request->validate([
            'name' => "required",
            'description' => 'required',
            'privilegeCodes'   => 'required'
        ]);

        //store organization;
        try {
            $privilegeCodes = json_decode($request->privilegeCodes);
            $permissions = Permission::whereIn('id', $privilegeCodes)->get();
            // return response()->json($permissions);
            $role = Role::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
            ]);
            foreach ($permissions as $permission) {
                $role->permissions()->create(
                    [
                        'code' => $permission->code,
                        'parentCode' => $permission?->parent?->code ?? 0,
                    ]
                );
            }
            $role = Role::with('permissions')->find($role->id);
            $role = new RoleResource($role);
            return response()->json(compact('role'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request)
    {
        $role = Role::find($request->id);
        if (!$role) {
            return response()->json(['error' => 'Role Not Found'], 500);
        }
        if(!auth()->user()->can('update',$role)){
            return response()->json(['message','UnAuthorized '],403);
        }

        $request->validate([
            'name'             => "required",
            'description'      => 'required',
            'privilegeCodes'   => 'required'
        ]);

        //store organization;
        try {
            $role->permissions()->delete();
            $role->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
            ]);
            $privilegeCodes = json_decode($request->privilegeCodes);
            $permissions = Permission::whereIn('id', $privilegeCodes)->get();
            foreach ($permissions as $permission) {
                $role->permissions()->create([
                    'code' => $permission->code,
                    'parentCode' => $permission?->parent?->code ?? 0,
                ]);
            }
            return response()->json(['role' => $role]);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        $role = Role::find($request->id);
        if (!$role) {
            return response()->json(['error' => "Role Not Found"], 404);
        }
        if(!auth()->user()->can('delete',$role)){
            return response()->json(['message','UnAuthorized '],403);
        }

        try {
            $role->permissions()->delete();
            $role->delete();
            return response()->json(['success' => "Role Deleted Successfully"]);
            //   $this->success();
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
