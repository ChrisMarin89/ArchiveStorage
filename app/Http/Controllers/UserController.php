<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('permission:app-users-create|app-users-read|app-users-update|app-users-delete')->only('index');
        $this->middleware('permission:app-users-create')->only('store');
        $this->middleware('permission:app-users-create')->only('create');
        $this->middleware('permission:app-users-read')->only('show');
        $this->middleware('permission:app-users-update')->only('update');
        $this->middleware('permission:app-users-delete')->only('destroy');
        $this->middleware('permission:app-users-update')->only('edit');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search['name'] = trim($request->get('name'));
        $search['lastname'] = trim($request->get('lastname'));
        $search['email'] = trim($request->get('email'));
        $search['profile'] = trim($request->get('profile'));
        $search['lang'] = trim($request->get('lang'));

        if(is_null($search['name']) || $search['name'] == '') $search['name'] = '%';
        else $search['name'] = str_replace('*', '%', $search['name']);
        if(is_null($search['lastname']) || $search['lastname'] == '') $search['lastname'] = '%';
        else $search['lastname'] = str_replace('*', '%', $search['lastname']);
        if(is_null($search['email']) || $search['email'] == '') $search['email'] = '%';
        else $search['email'] = str_replace('*', '%', $search['email']);
        if(is_null($search['profile']) || $search['profile'] == '') $search['profile'] = '%';
        else $search['profile'] = str_replace('*', '%', $search['profile']);
        if(is_null($search['lang']) || $search['lang'] == '') $search['lang'] = '%';
        else $search['lang'] = str_replace('*', '%', $search['lang']);

        $users = DB::table('users')
                    ->select('users.*', 'roles.name as profile')
                    ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                    ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
                    ->where('users.lastname', 'LIKE', $search['lastname'])
                    ->where('users.email', 'LIKE', $search['email'])
                    ->where('roles.name', 'LIKE', $search['profile'])
                    ->where('users.lang', 'LIKE', $search['lang'])
                    ->where('roles.name', '!=', 'SuperAdmin')
                    ->orderBy('users.email', 'asc')->paginate(15);
                    
        if($search['name'] == '%') $search['name'] = '';
        else $search['name'] = str_replace('%', '*', $search['name']);
        if($search['lastname'] == '%') $search['lastname'] = '';
        else $search['lastname'] = str_replace('%', '*', $search['lastname']);
        if($search['email'] == '%') $search['email'] = '';
        else $search['email'] = str_replace('%', '*', $search['email']);
        if($search['profile'] == '%') $search['profile'] = '';
        else $search['profile'] = str_replace('%', '*', $search['profile']);
        if($search['lang'] == '%') $search['lang'] = '';
        else $search['lang'] = str_replace('%', '*', $search['lang']);

        return view('users.index', ['users' => $users, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        $roles = Role::all();

        $permissions_except_app = array();
        /*
        foreach($permissions as $permission){
            if(!str_starts_with($permission->name, 'app-')) $permissions_except_app[] = $permission;
        }
        return view('users.edit', ['user' => User::findOrFail($id), 'permissions' => $permissions_except_app, 'roles' => $roles]);
        */
        
        return view('users.create', ['permissions' => $permissions, 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $user = new User();
        $user->name = request('name');
        $user->lastname = request('lastname');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        if(is_null($request->get('profile')) || $request->get('profile') == '') $user->syncRoles('User');
        else $user->syncRoles([$request->get('profile')]);

        $user->created_by = is_object(Auth::user()) ? Auth::user()->email : 'System';
        $user->updated_by = is_object(Auth::user()) ? Auth::user()->email : 'System';

        $user->save();
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $permissions = DB::table('permissions')
                            ->where('name', 'LIKE', 'web-%')
                            ->orderBy('name', 'asc')->get();
        
        return view('users.show', ['user' => $user, 'permissions' => $permissions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $permissions = DB::table('permissions')
                        ->where('name', 'LIKE', 'web-%')
                        ->orderBy('name', 'asc')->get();
        $roles = Role::where('name', '!=', 'SuperAdmin')->get(); 
        
        return view('users.edit', ['user' => $user, 'permissions' => $permissions, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->lastname = $request->get('lastname');
        $user->email = $request->get('email');
        $user->lang = $request->get('lang');
        if(!is_null(request('password')) && request('password') !='') $user->password = bcrypt(request('password'));

        $user->syncRoles([$request->get('profile')]);

        if(!is_null($request->get('permissions'))) $user->syncPermissions($request->get('permissions'));
        else foreach($user->getPermissionNames() as $revoved_permission) $user->revokePermissionTo($revoved_permission);

        $user->updated_by = is_object(Auth::user()) ? Auth::user()->email : 'System';

        $user->update();
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/users');
    }
}
