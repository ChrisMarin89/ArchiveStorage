<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionFormRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('permission:app-permissions-create|app-permissions-read|app-permissions-update|app-permissions-delete')->only('index');
        $this->middleware('permission:app-permissions-create')->only('store');
        $this->middleware('permission:app-permissions-create')->only('create');
        $this->middleware('permission:app-permissions-read')->only('show');
        $this->middleware('permission:app-permissions-update')->only('update');
        $this->middleware('permission:app-permissions-delete')->only('destroy');
        $this->middleware('permission:app-permissions-update')->only('edit');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search['name'] = trim($request->get('name'));

        if(is_null($search['name']) || $search['name'] == '') $search['name'] = '%';
        else $search['name'] = str_replace('*', '%', $search['name']);

        $permissions = Permission::where('name', 'NOT LIKE', 'app-%')
                            ->where('name', 'LIKE', $search['name'])
                            ->orderBy('name', 'asc')
                            ->paginate(15);

        if($search['name'] == '%') $search['name'] = '';
        else $search['name'] = str_replace('%', '*', $search['name']);  

        return view('permissions.index', ['permissions' => $permissions, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create', ['users' => User::whereNotIn('id', User::SuperAdminIDs())->get()]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionFormRequest $request)
    {
        $permission = new Permission();
        $permission->name = request('name');
        $permission->description = request('description');
        $permission->guard_name = 'web';
        $author = is_object(Auth::user()) ? Auth::user()->email : 'System';
        $permission->created_by = $author;
        $permission->updated_by = $author;
        $permission->save();

        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');
        
        if(!is_null($request->get('users'))){
            foreach($request->get('users') as $user_id){
                User::findOrFail($user_id)->givePermissionTo($permission->name);
            }
        }

        return redirect('/permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('permissions.show', ['permission' => Permission::findOrFail($id), 'users' => User::whereNotIn('id', User::SuperAdminIDs())->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd(Permission::findOrFail($id));
        return view('permissions.edit', ['permission' => Permission::findOrFail($id), 'users' => User::whereNotIn('id', User::SuperAdminIDs())->get()]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionFormRequest $request, $id)
    {
        $permission = Permission::findOrFail($id);
        // The name cannot be changed in Spatie Permissions (Create or Delete Permission only)
        //$permission->name = $request->get('name');
        $permission->description = $request->get('description');
        $permission->updated_by = is_object(Auth::user()) ? Auth::user()->email : 'System';
        $users = User::whereNotIn('id', User::SuperAdminIDs())->get();
        $permission->update();
        
        foreach ($users as $user) $user->revokePermissionTo($permission->name);
        if(!is_null($request->get('users'))){
            foreach($request->get('users') as $user_id){
                $user = USER::findOrFail($user_id);
                if(!$user->hasPermissionTo($permission->name)) $user->givePermissionTo($permission->name);
            }
        }

        return redirect('/permissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect('/permissions');
    }
}
