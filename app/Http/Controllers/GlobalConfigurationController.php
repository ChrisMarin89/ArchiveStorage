<?php

namespace App\Http\Controllers;

use App\Http\Requests\GlobalConfigurationFormRequest;
use App\Models\GlobalConfiguration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GlobalConfigurationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('permission:app-config-manage');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search['name'] = trim($request->get('name'));
        $search['description'] = trim($request->get('description'));
        $search['value'] = trim($request->get('value'));
        $search['type'] = trim($request->get('type'));

        if(is_null($search['name']) || $search['name'] == '') $search['name'] = '%';
        else $search['name'] = str_replace('*', '%', $search['name']);
        if(is_null($search['description']) || $search['description'] == '') $search['description'] = '%';
        else $search['description'] = str_replace('*', '%', $search['description']);
        if(is_null($search['value']) || $search['value'] == '') $search['value'] = '%';
        else $search['value'] = str_replace('*', '%', $search['value']);
        if(is_null($search['type']) || $search['type'] == '') $search['type'] = '%';
        else $search['type'] = str_replace('*', '%', $search['type']);

        $gcs = GlobalConfiguration::where('name', 'LIKE', $search['name'])
                            ->where('description', 'LIKE', $search['description'])
                            ->where('value', 'LIKE', $search['value'])
                            ->where('data_type', 'LIKE', $search['type'])
                            ->orderBy('name', 'asc')
                            ->paginate(15);

        if($search['name'] == '%') $search['name'] = '';
        else $search['name'] = str_replace('%', '*', $search['name']);
        if($search['description'] == '%') $search['description'] = '';
        else $search['description'] = str_replace('%', '*', $search['description']);  
        if($search['value'] == '%') $search['value'] = '';
        else $search['value'] = str_replace('%', '*', $search['value']);  
        if($search['type'] == '%') $search['type'] = '';
        else $search['type'] = str_replace('%', '*', $search['type']);  

        return view('config.globalconfigs.index', ['gcs' => $gcs, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('config.globalconfigs.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GlobalConfigurationFormRequest $request)
    {
        $gc = new GlobalConfiguration();
        $gc->name = request('name');
        $gc->description = request('description');
        $gc->value = request('value');
        $gc->data_type = request('type');
        $author = is_object(Auth::user()) ? Auth::user()->email : 'System';
        $gc->created_by = $author;
        $gc->updated_by = $author;
        $gc->save();

        return redirect('/config/globalconfigs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GlobalConfiguration  $globalConfiguration
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/config/globalconfigs');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GlobalConfiguration  $globalConfiguration
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('config.globalconfigs.edit', ['gc' => GlobalConfiguration::findOrFail($id)]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GlobalConfiguration  $globalConfiguration
     * @return \Illuminate\Http\Response
     */
    public function update(GlobalConfigurationFormRequest $request, $id)
    {
        $gc = GlobalConfiguration::findOrFail($id);

        $gc->description = $request->get('description');
        $gc->value = $request->get('value');
        $gc->data_type = $request->get('type');
        $gc->updated_by = is_object(Auth::user()) ? Auth::user()->email : 'System';
        $gc->update();
        

        return redirect('/config/globalconfigs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GlobalConfiguration  $globalConfiguration
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gc = GlobalConfiguration::findOrFail($id);
        $gc->delete();
        return redirect('/config/globalconfigs');
    }
}
