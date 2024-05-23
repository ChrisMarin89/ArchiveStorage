<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller
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
    public function index()
    {
        return view('config.index');
    }
}
