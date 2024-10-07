<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function edit($id)
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(ProfileFormRequest $request)
    {
        $user = Auth::user();
        
        $user->name = $request->get('name');
        $user->lastname = $request->get('lastname');
        $user->lang = $request->get('lang');
        if(!is_null(request('password')) && request('password') !='') $user->password = bcrypt(request('password'));

        $user->updated_by = is_object(Auth::user()) ? Auth::user()->email : 'System';

        $user->update();
        return redirect('/');
    }
}
