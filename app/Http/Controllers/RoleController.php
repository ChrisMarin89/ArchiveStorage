<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleFormRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('permission:app-roles-read|app-roles-update')->only('index');
        $this->middleware('permission:app-roles-read')->only('store');
        $this->middleware('permission:app-roles-read')->only('create');
        $this->middleware('permission:app-roles-read')->only('show');
        $this->middleware('permission:app-roles-update')->only('update');
        $this->middleware('permission:app-roles-update')->only('destroy');
        $this->middleware('permission:app-roles-update')->only('edit');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::where('name', '!=', 'SuperAdmin')->orderBy('id', 'asc')->get();
        return view('roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $users =  User::whereNotIn('id', User::SuperAdminIDs())->get();

        $permissions = DB::table('permissions')
                        ->where('name', 'LIKE', 'app-%')
                        ->where('name', '!=', 'app-super-admin')
                        ->orderBy('name', 'asc')->paginate(15);

        return view('roles.create', ['users' => $users, 'permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleFormRequest $request)
    {
        $role = new Role();
        $role->name = request('name');
        $role->description = request('description');
        $role->guard_name = 'web';
        $author = is_object(Auth::user()) ? Auth::user()->email : 'System';
        $role->created_by = $author;
        $role->updated_by = $author;
        $role->save();

        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $users = User::whereNotIn('id', User::SuperAdminIDs())->get();
        
        if(!is_null($request->get('users'))){
            foreach($request->get('users') as $user_id){
                $user = User::findOrFail($user_id);
                if(!$user->hasRole($role->name)) $user->syncRoles([$role->name]);
            }
        }
        if(!is_null($request->get('permissions'))) $role->syncPermissions($request->get('permissions'));
        else foreach($role->getPermissionNames() as $revoved_permission) $role->revokePermissionTo($revoved_permission);

        return redirect('/roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        $users =  User::whereNotIn('id', User::SuperAdminIDs())->get();

        $permissions = DB::table('permissions')
                        ->where('name', 'LIKE', 'app-%')
                        ->where('name', '!=', 'app-super-admin')
                        ->orderBy('name', 'asc')->paginate(15);

        return view('roles.show', ['role' => $role, 'users' => $users, 'permissions' => $permissions]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);

        $users =  User::whereNotIn('id', User::SuperAdminIDs())->get();

        $permissions = DB::table('permissions')
                        ->where('name', 'LIKE', 'app-%')
                        ->where('name', '!=', 'app-super-admin')
                        ->orderBy('name', 'asc')->paginate(15);

        return view('roles.edit', ['role' => $role, 'users' => $users, 'permissions' => $permissions]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleFormRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        // The name cannot be changed in Spatie Permissions (Create or Delete Role only)
        //$role->name = $request->get('name');
        $role->description = $request->get('description');
        $role->updated_by = is_object(Auth::user()) ? Auth::user()->email : 'System';
        $users = User::whereNotIn('id', User::SuperAdminIDs())->get();
        
        //foreach ($users as $user) $user->removeRole($role->name);
        if(!is_null($request->get('users'))){
            foreach($request->get('users') as $user_id){
                $user = User::findOrFail($user_id);
                if(!$user->hasRole($role->name)) $user->syncRoles([$role->name]);
            }
        }
        if(!is_null($request->get('permissions'))) $role->syncPermissions($request->get('permissions'));
        else foreach($role->getPermissionNames() as $revoved_permission) $role->revokePermissionTo($revoved_permission);

        $role->update();
        return redirect('/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect('/roles');
    }
}
