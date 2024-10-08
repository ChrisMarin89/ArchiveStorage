<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParserTemplateFormRequest;
use App\Models\ParserTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ParserTemplateController extends Controller
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

        if(is_null($search['name']) || $search['name'] == '') $search['name'] = '%';
        else $search['name'] = str_replace('*', '%', $search['name']);
        if(is_null($search['description']) || $search['description'] == '') $search['description'] = '%';
        else $search['description'] = str_replace('*', '%', $search['description']);

        $objects = ParserTemplate::where('name', 'LIKE', $search['name'])
                            ->where('description', 'LIKE', $search['description'])
                            ->orderBy('name', 'asc')
                            ->paginate(15);

        if($search['name'] == '%') $search['name'] = '';
        else $search['name'] = str_replace('%', '*', $search['name']);
        if($search['description'] == '%') $search['description'] = '';
        else $search['description'] = str_replace('%', '*', $search['description']);  

        return view('config.parsertemplates.index', ['objects' => $objects, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('config.parsertemplates.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParserTemplateFormRequest $request)
    {
        $object = new ParserTemplate();
        $object->name = request('name');
        $object->description = request('description');
        $object->value = request('value');
        $author = is_object(Auth::user()) ? Auth::user()->email : 'System';
        $object->created_by = $author;
        $object->updated_by = $author;
        $object->save();

        return redirect('/config/parsertemplates');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ParserTemplate  $parserTemplate
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/config/parsertemplates');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ParserTemplate  $parserTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('config.parsertemplates.edit', ['object' => ParserTemplate::findOrFail($id)]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ParserTemplate  $parserTemplate
     * @return \Illuminate\Http\Response
     */
    public function update(ParserTemplateFormRequest $request, $id)
    {
        $object = ParserTemplate::findOrFail($id);

        $object->description = $request->get('description');
        $object->value = $request->get('value');
        $object->updated_by = is_object(Auth::user()) ? Auth::user()->email : 'System';
        $object->update();
        

        return redirect('/config/parsertemplates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParserTemplate  $parserTemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $object = ParserTemplate::findOrFail($id);
        $object->delete();
        return redirect('/config/parsertemplates');
    }
}
