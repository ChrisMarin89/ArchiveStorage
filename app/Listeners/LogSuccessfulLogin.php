<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Login $event)
    {
        /*
        $user=Auth::User()->role->role_name;
        if($user=="Admin"){
            return Redirect::route('dashboard');
            #return redirect()->route('login');
        }
        elseif($user == "Employer" ){
            dd("hello");
        }
        */
        $user = Auth::user();

        if(is_null($user->login_count)) $user->login_count = 1;
        else $user->login_count++;

        $user->last_login_at = new \DateTime();
        
        $user->save();

    }
}
