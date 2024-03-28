<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use App\Models\Permission;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(is_null($request)){
            $users = User::all()->orderBy('email', 'asc')->paginate(15);
            return view('users.index', ['users' => $users]);
        }else{
            $search['name'] = trim($request->get('name'));
            $search['lastname'] = trim($request->get('lastname'));
            $search['email'] = trim($request->get('email'));

            if(is_null($search['name']) || $search['name'] == '') $search['name'] = '%';
            else $search['name'] = str_replace('*', '%', $search['name']);
            if(is_null($search['lastname']) || $search['lastname'] == '') $search['lastname'] = '%';
            else $search['lastname'] = str_replace('*', '%', $search['lastname']);
            if(is_null($search['email']) || $search['email'] == '') $search['email'] = '%';
            else $search['email'] = str_replace('*', '%', $search['email']);

            $users = User::where('name', 'LIKE', $search['name'])
                        ->where('lastname', 'LIKE', $search['lastname'])
                        ->where('email', 'LIKE', $search['email'])
                        ->orderBy('email', 'asc')
                        ->paginate(15);

            if($search['name'] == '%') $search['name'] = '';
            else $search['name'] = str_replace('%', '*', $search['name']);
            if($search['lastname'] == '%') $search['lastname'] = '';
            else $search['lastname'] = str_replace('%', '*', $search['lastname']);
            if($search['email'] == '%') $search['email'] = '';
            else $search['email'] = str_replace('%', '*', $search['email']);

            return view('users.index', ['users' => $users, 'search' => $search]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
        return view('users.show', ['user' => User::findOrFail($id)]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = Permission::all();
        $permissions_except_app = array();
        /*
        foreach($permissions as $permission){
            if(!str_starts_with($permission->name, 'app-')) $permissions_except_app[] = $permission;
        }
        return view('users.edit', ['user' => User::findOrFail($id), 'permissions' => $permissions_except_app]);
        */
        return view('users.edit', ['user' => User::findOrFail($id), 'permissions' => $permissions]);
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

        if(!is_null($request->get('permissions'))) $user->syncPermissions($request->get('permissions'));
        else foreach($user->getPermissionNames() as $revoved_permission) $user->revokePermissionTo($revoved_permission);

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
