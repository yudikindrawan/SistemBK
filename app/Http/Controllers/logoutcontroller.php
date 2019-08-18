<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class logoutcontroller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getlogout()
    {
        return view('logout');
    }

    public function logout(){
        Auth::logout();
        return redirect(route('login'));
    }
}
