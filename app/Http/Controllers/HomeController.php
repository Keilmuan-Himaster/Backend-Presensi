<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // $check = Auth::check();
        // if($check){
            $user = Auth::user();
            // dd($user);
            $event = $user->event;
            $event_check = Event::where('user_id',$user->id)->get()->first();
            // dd($event_check);
            // $code = Code::whereHas('id', $event->user_id);
            return view('frontend.home.index',compact(['user','event','event_check']));
        // }
    }
}
