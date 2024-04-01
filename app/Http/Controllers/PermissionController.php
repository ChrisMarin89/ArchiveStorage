<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionFormRequest;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
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
            $permissions = DB::table('permissions')
                                ->where('name', 'LIKE', 'web-%')
                                ->orderBy('name', 'asc')->paginate(15);
            return view('permissions.index', ['permissions' => $permissions]);
        }else{
            $search['name'] = trim($request->get('name'));

            if(is_null($search['name']) || $search['name'] == '') $search['name'] = '%';
            else $search['name'] = str_replace('*', '%', $search['name']);

            $permissions = DB::table('permissions')
                                ->where('name', 'LIKE', 'web-%')
                                ->where('name', 'LIKE', $search['name'])
                                ->orderBy('name', 'asc')
                                ->paginate(15);

            if($search['name'] == '%') $search['name'] = '';
            else $search['name'] = str_replace('%', '*', $search['name']);  

            return view('permissions.index', ['permissions' => $permissions, 'search' => $search]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
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
        $permission->guard_name = 'web';

        $permission->save();
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
        return view('permissions.show', ['permission' => Permission::findOrFail($id)]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('permissions.edit', ['permission' => Permission::findOrFail($id), 'users' => User::all()]); 
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
        $users = USER::all();
        
        foreach ($users as $user) $user->revokePermissionTo($permission->name);
        if(!is_null($request->get('users'))){
            foreach($request->get('users') as $user_id){
                $user = USER::findOrFail($user_id);
                if(!$user->hasPermissionTo($permission->name)) $user->givePermissionTo($permission->name);
            }
        }

        $permission->update();
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
