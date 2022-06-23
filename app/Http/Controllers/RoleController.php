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
        $roles = Role::latest()->get();
        // dd($roles);
        return view('organizations.roles.index', compact('roles'));
    }
    public function getRole(Request $request)
    {
        $role = new RoleResource(Role::with('permissions')->find($request->id), true);
        if (!$role) {
            return response()->json(['error' => "Role Not Found"], 404);
        }
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
            // $this->success('Organization has been created successfully');
        } catch (\Exception $e) {
            // $this->error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request)
    {
        //
        $role = Role::find($request->id);
        if (!$role) {
            return response()->json(['error' => 'Role Not Found'], 500);
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
            // $this->error($e->getMessage());
            return response()->json($e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        $role = Role::find($request->id);
        if (!$role) {
            return response()->json(['error' => "Role Not Found"], 404);
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
