<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountsController extends Controller
{
    public function index()
    {
        $this->authorize('viewany',User::class);
        $roles = Role::all();
        if(auth()->user()->type === 'super_admin'){
            $roles = Role::latest()->get();
        }else{
            $roles =  auth()->user()->roles;
        }
        return view('organizations.accounts.index', compact('roles'));
    }

    public function getAccounts(Request $request)
    {
        $limit     = $request->limit;
        if(auth()->user()->type === 'super_admin'){
            $total     = User::count();
        }else{
            $total     = User::where('organization_id',auth()->user()->organization_id)->count();
        }
        $totalPage = (int) ceil($total/$limit);

        $offset    = $request->offset;
        $pageNum   = $offset == 0 ?1:$limit/$offset+1;
        if(auth()->user()->type === 'super_admin'){
            $users     = User::with(['roles','organization'])->skip($request->offset)->take($limit)->where([
               ['type','<>','super_admin']
            ])->orderBy('id',$request->input('order'))->get();
        }
        else{
            $users     = User::with(['roles','organization'])->skip($request->offset)->take($limit)->where([
              ['type','<>','super_admin'],
              ['organization_id','=',auth()->user()->organization_id],
            ])->orderBy('id',$request->input('order'))->get();
        }
        $users = UserResource::collection($users);
        // $users = User::all();
        return response()->json(['rows'=>$users,'pageNum'=>$pageNum,'pageSize'=>$limit,'total'=>$total,'totalPage'=>$totalPage]);
    }

    public function store(Request $request)
    {

        if(!auth()->user()->can('create',User::class)){
            return response()->json(['message','UnAuthorized '],403);
        }
        $request->validate([
            'name'     => "required",
            'email'     => "required",
            'areaId'   => 'required',
            'type'       => 'required',
            'roleIds'    => 'required'
        ]);


        //oraganization based code number should be unique
        //store organization;
        try {
            DB::beginTransaction();
            $data = array(
                'name'       =>  $request->input('name'),
                'email'      =>  $request->input('email'),
                'password'   =>  bcrypt('123456'),
                'organization_id'   =>  $request->input('areaId'),
                'type'        =>  $request->input('type'),
                'loginIp'     =>  null,
                'loginTime'   =>  null,
                'mobile'      =>  null,
                'online'      => false,
            );
            $user    = User::create($data);
            $roleIds = json_decode($request->input('roleIds'));
            $user->roles()->attach($roleIds);
            DB::commit();
            return response()->json(['success'=>'User has been created Successfully']);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        if (!$user) {
            return response()->json(['error'=>'user not found'],404);
        }
        if(!auth()->user()->can('update',$user)){
            return response()->json(['message','UnAuthorized '],403);
        }


        $request->validate([
            'id'       => 'required',
            'name'     => "required",
            'email'     => "required",
            'areaId'   => 'required',
            'type'       => 'required',
            'roleIds'    => 'required'
        ]);

        //store organization;
        try {

            DB::beginTransaction();
            $data = array(
                'name'       =>  $request->input('name'),
                'email'      =>  $request->input('email'),
                'password'   =>   $request->input('password')?$request->input('password'):bcrypt('123456'),
                'organization_id'   =>  $request->input('areaId'),
                'type'        =>  $request->input('type'),
                'loginIp'     =>  null,
                'loginTime'   =>  null,
                'mobile'      =>  null,
                'online'      => false,
            );
            $user->update($data);
            $roleIds = json_decode($request->input('roleIds'));
            $user->roles()->detach();
            $user->roles()->attach($roleIds);
            DB::commit();
            return response()->json(['success'=>'User has been Update Successfully']);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }

    public function destroy()
    {
        $user = User::find(request()->input('id'));
        if (!$user) {
            return response()->json(['error'=>'user not found'],404);
        }
        if(!auth()->user()->can('delete',$user)){
            return response()->json(['message','UnAuthorized '],403);
        }

        try {
            $user->roles()->detach();
            $user->delete();
            return response()->json(['success'=>'User has been Deleted Successfully']);
        } catch (Exception $e) {
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }
}