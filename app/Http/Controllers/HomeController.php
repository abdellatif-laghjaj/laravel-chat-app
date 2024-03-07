<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        $users = User::select("*")->whereNotNull('last_seen')->orderBy('last_seen', 'ASC')->get();
        $current_user = User::select("*")->where('id',auth()->user()->id)->first();
        return view('home',compact('users','current_user'));
    }
}
