<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
    public function profile($id)
    {
        $user = User::where('id',$id)->first();

        return view('profile',compact('user'));
    }

    public function updateProfileImg($id,Request $request){
        $image = Storage::disk('public')->putFile('profile_images', request()->avatar);
        $user = User::find($id);
        $user->update([
            'profile_image' => $image
        ]);
    
        return redirect()->back();
    }
}
